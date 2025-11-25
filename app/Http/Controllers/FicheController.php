<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiche;
use App\Models\Article;
use App\Models\Thematique;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class FicheController extends Controller
{
    // Page principale (dashboard privé)
    public function index()
    {
        $fiches = Fiche::where('user_id', auth()->id())->latest()->paginate(6);
        $thematiques = Thematique::all();

        return view('mon_espace.fiches', compact('fiches', 'thematiques'));
    }

    // Formulaire d’ajout
    public function create()
    {
        $thematiques = Thematique::all();
        return view('mon_espace.fiche_create', compact('thematiques'));
    }

    // Enregistre une nouvelle fiche
    public function store(Request $request)
    {
        $data = $request->validate([
            'record_type'   => 'required|string|max:255',
            'titre'         => 'required|string|max:255',
            'resume'        => 'nullable|string',
            'description'   => 'nullable|string',
            'auteurs'       => 'nullable|string|max:255',
            'annee'         => 'nullable|string|max:10',
            'discipline'    => 'nullable|string|max:255',
            'thematique'    => 'nullable|string|max:255',
            'mots_cles'     => 'nullable|string|max:255',
            'source'        => 'nullable|string',
            'url'           => 'nullable|url',
            'fichier'       => 'nullable|file|mimes:pdf,doc,docx|max:4096',
            'document'      => 'nullable|file|mimes:pdf,doc,docx|max:4096',
        ]);

        $data['user_id'] = auth()->id();
        $data['status'] = 'validated';

        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('fiches', $filename, 'public');
            $data['fichier'] = 'fiches/' . $filename;
        }

        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $documentName = time() . '_' . $document->getClientOriginalName();
            $document->storeAs('documents', $documentName, 'public');
            $data['document'] = 'documents/' . $documentName;
        }

        Fiche::create($data);

        return redirect()->route('fiches.listes')
                         ->with('success', '✔ Fiche enregistrée avec succès !');
    }

    // Liste des fiches
    public function listes()
    {
        $fiches = Fiche::where('user_id', auth()->id())->latest()->paginate(6);
        return view('mon_espace.fiches_listes', compact('fiches'));
    }

    // Formulaire d’édition
    public function edit($id)
    {
        $fiche = Fiche::findOrFail($id);
        $thematiques = Thematique::all();
        return view('mon_espace.fiche_edit', compact('fiche', 'thematiques'));
    }

    // Mise à jour d’une fiche
    public function update(Request $request, $id)
    {
        $fiche = Fiche::findOrFail($id);

        $validated = $request->validate([
            'record_type'   => 'required|string|max:255',
            'titre'         => 'required|string|max:255',
            'resume'        => 'nullable|string',
            'description'   => 'nullable|string',
            'auteurs'       => 'nullable|string|max:255',
            'annee'         => 'nullable|string|max:10',
            'discipline'    => 'nullable|string|max:255',
            'thematique'    => 'nullable|string|max:255',
            'mots_cles'     => 'nullable|string|max:255',
            'source'        => 'nullable|string',
            'url'           => 'nullable|url',
            'fichier'       => 'nullable|file|mimes:pdf,doc,docx|max:4096',
            'document'      => 'nullable|file|mimes:pdf,doc,docx|max:4096',
        ]);

        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('fiches', $filename, 'public');
            $validated['fichier'] = 'fiches/' . $filename;
        }

        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $documentName = time() . '_' . $document->getClientOriginalName();
            $document->storeAs('documents', $documentName, 'public');
            $validated['document'] = 'documents/' . $documentName;
        }

        $fiche->update($validated);

        return redirect()->route('fiches.listes')
                         ->with('success', '✏️ Fiche modifiée avec succès !');
    }

    // Supprime une fiche
    public function destroy($id)
    {
        $fiche = Fiche::findOrFail($id);
        $fiche->delete();

        return redirect()->route('fiches.listes')
                         ->with('success', '🗑 Fiche supprimée avec succès !');
    }

    // Affiche une fiche publique avec **toutes les informations**
    public function showPublic($id)
    {
        $fiche = Fiche::findOrFail($id); // On récupère directement par ID

        // Fallbacks si certains champs sont vides
        $fiche->resume      = $fiche->resume ?? Str::limit($fiche->description ?? '', 150);
        $fiche->auteurs     = $fiche->auteurs ?? ($fiche->user?->name ?? 'Inconnu');
        $fiche->discipline  = $fiche->discipline ?? 'Non précisée';
        $fiche->mots_cles   = $fiche->mots_cles ?? 'Non renseignés';
        $fiche->description = $fiche->description ?? 'Aucune description disponible';
        $fiche->type        = $fiche->titre ?? 'Fiche Technique';
        $fiche->source      = $fiche->source ?? $fiche->url ?? null;
        // Ajout du document (avec fallback)
        $fiche->document    = $fiche->document ?? 'Document non disponible';


        return view('publications.fiches_detail', compact('fiche'));
    }

public function showDocument($id)
{
    $fiche = Fiche::findOrFail($id);

    // Vérifie si le document existe
    if ($fiche->document && file_exists(storage_path('app/public/' . $fiche->document))) {
        // Si c'est un PDF → on peut l'afficher dans la vue
        return view('publications.fiche_document', compact('fiche'));
    }

    // Si document inexistant → on retourne une vue avec message
    return view('publications.fiche_document_non_disponible', compact('fiche'));
}

    
    // Liste publique combinée Articles + Fiches
    public function indexPublic(Request $request)
    {
        $articles = Article::where('status', 'published')->latest()->get();
        $fiches   = Fiche::where('status', 'validated')->latest()->get();

        $combined = collect();

        foreach ($articles as $article) {
            $combined->push(['type' => 'article', 'data' => $article]);
        }

        foreach ($fiches as $fiche) {
            $combined->push(['type' => 'fiche', 'data' => $fiche]);
        }

        $combined = $combined->sortByDesc(fn($item) => $item['data']->created_at);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 6;
        $currentItems = $combined->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginatedCombined = new LengthAwarePaginator(
            $currentItems,
            $combined->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('publications.index', ['combined' => $paginatedCombined]);
    }

    // Fiche individuelle (privée)
    public function show($id)
    {
        $fiche = Fiche::findOrFail($id);
        return view('mon_espace.fiches.show', compact('fiche'));
    }
}




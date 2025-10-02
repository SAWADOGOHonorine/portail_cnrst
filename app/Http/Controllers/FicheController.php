<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiche;
use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

class FicheController extends Controller
{
    /**
     * Liste des fiches de l’utilisateur connecté (Dashboard privé)
     */
    public function index()
    {
        $fiches = Fiche::where('user_id', auth()->id())->latest()->get();
        return view('mon_espace.fiches', compact('fiches'));
    }
    // pour le formulaire d'ajout d'une nouvelle fiche
    public function create()
    {
        return view('mon_espace.fiche_create');
    }

    /**
     * Affiche le formulaire de modification d’une fiche (Dashboard privé)
     */
    public function edit($id)
    {
        $fiche = Fiche::findOrFail($id);
        return view('mon_espace.fiche_edit', compact('fiche'));
    }

    /**
     * Enregistre une nouvelle fiche (Dashboard privé)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'record_type'   => 'required|string|max:255',
            'content'       => 'required|string',
            'creation_date' => 'nullable|date',
            'url'           => 'nullable|url',
            'responsible'   => 'nullable|string|max:255',
            'fichier'       => 'nullable|file|mimes:pdf,doc,docx|max:4096',
        ]);

        $data['user_id'] = auth()->id();
        $data['status'] = 'validated'; // Statut forcé pour affichage public

        if ($request->hasFile('fichier')) {
            $data['fichier'] = $request->file('fichier')->store('fiches', 'public');
        }

        Fiche::create($data);

        return redirect()->route('fiches.index')
                         ->with('success', '✅ Fiche enregistrée avec succès.');
    }

    /**
     * Met à jour une fiche existante (Dashboard privé)
     */
    public function update(Request $request, $id)
    {
        $fiche = Fiche::findOrFail($id);

        $validated = $request->validate([
            'record_type'   => 'required|string|max:255',
            'content'       => 'nullable|string',
            'creation_date' => 'nullable|date',
            'url'           => 'nullable|url',
            'responsible'   => 'nullable|string|max:255',
            'status'        => 'nullable|string|max:50',
            'fichier'       => 'nullable|file|mimes:pdf,doc,docx|max:4096',
        ]);

        if ($request->hasFile('fichier')) {
            $validated['fichier'] = $request->file('fichier')->store('fiches', 'public');
        }

        $fiche->update($validated);

        return redirect()->route('fiches.index')
                         ->with('success', '✏️ Fiche modifiée avec succès !');
    }

    /**
     * Supprime une fiche (Dashboard privé)
     */
    public function destroy($id)
    {
        $fiche = Fiche::findOrFail($id);
        $fiche->delete();

        return redirect()->route('fiches.index')
                         ->with('success', '🗑 Fiche supprimée avec succès !');
    }

    /**
     * Liste des fiches publiques (site web public)
     * Combine avec les articles publiés pour affichage global
     */
    public function indexPublic(Request $request)
    {
        // Articles publiés
        $articles = Article::where('status', 'published')->latest()->get();

        // Fiches validées
        $fiches = Fiche::where('status', 'validated')->latest()->get();

        // Combine les deux en ne conservant que les infos publiques
        $combined = collect();

        foreach ($articles as $article) {
            $combined->push([
                'type' => 'article',
                'data' => [
                    'id' => $article->id,
                    'titre' => $article->title,
                    'summary' => $article->summary,
                    'co_authors' => $article->co_authors,
                    'journal' => $article->journal,
                    'publication_date' => $article->publication_date,
                    'url' => $article->url,
                    'fichier' => $article->fichier,
                    'created_at' => $article->created_at,
                ]
            ]);
        }

        foreach ($fiches as $fiche) {
            $combined->push([
                'type' => 'fiche',
                'data' => [
                    'id' => $fiche->id,
                    'titre' => $fiche->titre,
                    'description' => $fiche->content,
                    'url' => $fiche->url,
                    'fichier' => $fiche->fichier,
                    'created_at' => $fiche->created_at,
                ]
            ]);
        }

        // Tri par date décroissante
        $combined = $combined->sortByDesc(fn($item) => $item['data']['created_at']);

        // Pagination manuelle (6 éléments par page)
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
}



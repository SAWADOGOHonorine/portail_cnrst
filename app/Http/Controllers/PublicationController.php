<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    /**
     * Affiche la liste publique des publications.
     */
    public function index()
    {
        $publications = Publication::latest()->paginate(10);
        return view('documentation.publications', compact('publications'));
    }

    /**
     * Affiche le formulaire d’ajout dans le dashboard.
     */
    public function create()
    {
        return view('dashboard.publication_form');
    }

    /**
     * Enregistre une nouvelle publication.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'auteurs' => 'nullable|string|max:255',
            'annee' => 'nullable|integer|min:1900|max:' . date('Y'),
            'theme' => 'nullable|string|max:100',
            'resume' => 'nullable|string',
            'mots_cles' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
            'lien_externe' => 'nullable|url|max:255',
            'fichier' => 'nullable|file|mimes:pdf|max:20480',
        ]);

        if ($request->hasFile('fichier')) {
            $validated['fichier'] = $request->file('fichier')->store('publications', 'public');
        }

        Publication::create($validated);

        return redirect()->route('publications.create')->with('success', 'Publication enregistrée avec succès.');
    }

    /**
     * Affiche la fiche détaillée d’une publication (optionnel).
     */
    public function show($id)
    {
        $publication = Publication::findOrFail($id);
        return view('publications.show', compact('publication'));
    }
}




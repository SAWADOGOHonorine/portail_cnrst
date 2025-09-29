<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiche;

class FicheController extends Controller
{
    /**
     * Liste des fiches de l’utilisateur connecté (Dashboard).
     */
    public function index()
    {
        $fiches = Fiche::where('user_id', auth()->id())->latest()->get();
        return view('mon_espace.fiches', compact('fiches'));
    }

    /**
     * Affiche une fiche pour modification (Dashboard).
     */
    public function edit($id)
    {
        $fiche = Fiche::findOrFail($id);
        return view('mon_espace.fiches_edit', compact('fiche'));
    }

    /**
     * Enregistre une nouvelle fiche.
     * ✅ Statut forcé à 'validated' pour affichage public immédiat
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
        $data['status'] = 'validated'; // Statut forcé

        if ($request->hasFile('fichier')) {
            $data['fichier'] = $request->file('fichier')->store('fiches', 'public');
        }

        Fiche::create($data);

        return back()->with('success', '✅ Fiche enregistrée avec succès.');
    }

    /**
     * Met à jour une fiche existante.
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

        return redirect()->route('fiches.index')->with('success', '✏️ Fiche modifiée avec succès !');
    }

    /**
     * Supprime une fiche.
     */
    public function destroy($id)
    {
        $fiche = Fiche::findOrFail($id);
        $fiche->delete();

        return redirect()->route('fiches.index')->with('success', '🗑 Fiche supprimée avec succès !');
    }

    /**
     * Liste des fiches validées sur le site public.
     */
    public function indexPublic()
    {
        $fiches = Fiche::where('status', 'validated')->latest()->get();
        return view('publications.fiche_index', compact('fiches'));
    }
}


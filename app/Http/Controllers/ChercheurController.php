<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chercheur;

class ChercheurController extends Controller
{
    // Afficher tous les chercheurs
    public function index()
    {
        $chercheurs = Chercheur::all();
        return view('pages.chercheurs', compact('chercheurs'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('pages.chercheur.create');
    }

    // Enregistrer un nouveau chercheur
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:chercheurs,email',
        ]);

        Chercheur::create($request->all());

        return redirect()->route('chercheur.index')
                         ->with('success', 'Chercheur ajouté avec succès.');
    }

    // Afficher un chercheur spécifique
    public function show($id)
    {
        $chercheur = Chercheur::findOrFail($id);
        return view('pages.chercheur.show', compact('chercheur'));
    }

    // Afficher le formulaire d’édition
    public function edit($id)
    {
        $chercheur = Chercheur::findOrFail($id);
        return view('pages.chercheur.edit', compact('chercheur'));
    }

    // Mettre à jour un chercheur
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:chercheurs,email,' . $id,
        ]);

        $chercheur = Chercheur::findOrFail($id);
        $chercheur->update($request->all());

        return redirect()->route('chercheur.index')
                         ->with('success', 'Chercheur mis à jour avec succès.');
    }

    // Supprimer un chercheur
    public function destroy($id)
    {
        $chercheur = Chercheur::findOrFail($id);
        $chercheur->delete();

        return redirect()->route('chercheur.index')
                         ->with('success', 'Chercheur supprimé avec succès.');
    }
}

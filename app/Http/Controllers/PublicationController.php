<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function index(Request $request)
    {
        $query = Publication::query();

        // Filtrage facultatif par journal
        if ($request->filled('journal')) {
            $query->where('journal', $request->journal);
        }

        // Filtrage facultatif par auteur
        if ($request->filled('auteur')) {
            $query->where('auteur', 'like', '%' . $request->auteur . '%');
        }

        // Filtrage facultatif par année
        if ($request->filled('annee')) {
            $query->where('annee', $request->annee);
        }

        // Résultat trié du plus récent au plus ancien, avec pagination
        $publications = $query->latest()->paginate(10);

        return view('publications.index', compact('publications'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'journal' => 'required|string|max:255',
            'annee' => 'nullable|numeric|min:1900|max:2099',
            'lien_externe' => 'nullable|url',
            'auteur' => 'required|string|max:255',
            'co_auteurs' => 'nullable|string',
            'resume' => 'nullable|string',
            // 'statut' peut être ignoré si pas utilisé pour le public
        ]);

        $data['user_id'] = auth()->id();

        Publication::create($data);

        return redirect()->route('publications.index')->with('success', '✅ Publication enregistrée avec succès.');
    }
}









<?php

namespace App\Http\Controllers;

use App\Models\Laboratoire;
use Illuminate\Http\Request;

class LaboratoireController extends Controller
{
    /**
     * Afficher la liste des laboratoires (page publique).
     */
    public function index(Request $request)
    {
        $query = Laboratoire::query();

        // Recherche par mot clé (nom ou sigle)
        if ($request->filled('q')) {
            $query->where('nom', 'like', '%' . $request->q . '%')
                  ->orWhere('sigle', 'like', '%' . $request->q . '%');
        }

        // Filtre par discipline
        if ($request->filled('discipline')) {
            $query->where('discipline', $request->discipline);
        }

        // Filtre par établissement (UFR)
        if ($request->filled('etablissement')) {
            $query->where('etablissement', $request->etablissement);
        }

        // Pagination
        $laboratoires = $query->paginate(10);

        return view('pages.laboratoire_index', compact('laboratoires'));
    }

    /**
     * Afficher le détail d’un laboratoire spécifique.
     */
    public function show($id)
    {
        $laboratoire = Laboratoire::findOrFail($id);

        return view('pages.laboratoire_show', compact('laboratoire'));
    }
}


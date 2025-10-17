<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Enseignant;
// use App\Models\Publication;
// use App\Models\Laboratoire;
// use App\Models\Projet;

// class PaginationGeneralController extends Controller
// {
    /**
     * Affiche la page des chercheurs avec les statistiques dynamiques
     */
    // public function index(Request $request)
    // {
        // Compter les données dynamiquement depuis la base
        // $enseignantsCount = Enseignant::count();
        // $publicationsCount = Publication::count();
        // $laboratoiresCount = Laboratoire::count();
        // $projetsCount = Projet::count();

        // Récupérer la liste des chercheurs (avec pagination si nécessaire)
        // $chercheurs = Enseignant::query()
        //     ->when($request->q, function($query, $q) {
        //         $query->where('nom', 'like', "%{$q}%")
        //               ->orWhere('prenom', 'like', "%{$q}%");
        //     })
        //     ->when($request->ufr, function($query, $ufr) {
        //         $query->where('ufr', $ufr);
        //     })
        //     ->when($request->discipline, function($query, $discipline) {
        //         $query->where('discipline', $discipline);
        //     })
        //     ->when($request->labo, function($query, $labo) {
        //         $query->where('laboratoire', $labo);
        //     })
        //     ->paginate(10); 

        // Retourner la vue avec toutes les données
//         return view('chercheurs.index', compact(
//             'enseignantsCount',
//             'publicationsCount',
//             'laboratoiresCount',
//             'projetsCount',
//             'chercheurs'
//         ));
//     }
// }

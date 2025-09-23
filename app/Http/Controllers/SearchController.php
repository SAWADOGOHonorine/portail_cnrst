<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Exemple : recherche dans les actualités
        $results = Actualite::where('titre', 'like', "%{$query}%")
                    ->orWhere('contenu', 'like', "%{$query}%")
                    ->get();

        return view('pages.search', compact('query', 'results'));
    }
}


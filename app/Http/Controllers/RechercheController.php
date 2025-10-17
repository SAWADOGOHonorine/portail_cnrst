<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Fiche;
use App\Models\Thematique;

class RechercheController extends Controller
{
    /**
     * Affiche les résultats de recherche pour articles et fiches
     */
    public function search(Request $request)
    {
        $query = $request->input('q'); // correspond à l'input name="q"

        // Rechercher dans les articles
        $articles = Article::with('thematique')
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('author', 'LIKE', "%{$query}%")
            ->orWhere('co_authors', 'LIKE', "%{$query}%")
            ->orWhere('summary', 'LIKE', "%{$query}%")
            ->get();

        // Rechercher dans les fiches
        $fiches = Fiche::with('thematique')
            ->where('record_type', 'LIKE', "%{$query}%")
            ->orWhere('responsible', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        // Fusionner les collections et trier par date de création
        $publications = $articles->concat($fiches)
            ->sortByDesc('created_at');

        // Passer les résultats et la requête à la vue
        return view('recherche.index', compact('publications', 'query'));
    }
}

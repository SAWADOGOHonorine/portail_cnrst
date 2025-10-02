<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Fiche;
use App\Models\Thematique;

class HomeController extends Controller
{
    public function index()
    {
        // Charger les articles et fiches avec leur thématique
        $articles = Article::with('thematique')->latest()->get();
        $fiches   = Fiche::with('thematique')->latest()->get();

        // Fusionner et prendre les 5 publications les plus récentes
        $publications = $articles->concat($fiches)
                                 ->sortByDesc('created_at')
                                 ->take(10);

        // Charger les thématiques avec leurs publications
        $thematiques = Thematique::with(['articles', 'fiches'])->get();

        return view('welcome', compact('publications', 'thematiques'));
    }
}




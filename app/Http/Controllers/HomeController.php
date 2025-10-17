<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Fiche;
use App\Models\Thematique;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Page d'accueil : affichage des publications récentes
     */
    public function index()
    {
        // === ARTICLES récents ===
        $articles = Article::with('user')
            ->select('id', 'title', 'summary', 'author', 'co_authors', 'publication_date', 'created_at')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($article) {
                $article->type = 'Article';
                return $article;
            });

        // === FICHES récentes ===
        $fiches = Fiche::select('id', 'titre', 'resume', 'auteurs', 'responsible', 'discipline', 'thematique', 'creation_date', 'created_at')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($fiche) {
                $fiche->type = 'Fiche';
                return $fiche;
            });

        // === Fusion des deux collections ===
        $publications = $articles->concat($fiches)->sortByDesc('created_at');

        // === Thématiques (pour la colonne droite) ===
        $thematiques = Thematique::withCount(['articles', 'fiches'])->get();

        return view('welcome', compact('publications', 'thematiques'));
    }

    /**
     * Recherche dans les publications (Articles + Fiches)
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        // === Recherche dans les ARTICLES ===
        $articles = Article::query()
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('author', 'LIKE', "%{$query}%")
                  ->orWhere('co_authors', 'LIKE', "%{$query}%")
                  ->orWhere('summary', 'LIKE', "%{$query}%");
            })
            ->select('id', 'title', 'summary', 'author', 'co_authors', 'publication_date', 'created_at')
            ->latest()
            ->get()
            ->map(function ($article) {
                $article->type = 'Article';
                return $article;
            });

        // === Recherche dans les FICHES ===
        $fiches = Fiche::query()
            ->when($query, function ($q) use ($query) {
                $q->where('titre', 'LIKE', "%{$query}%")
                  ->orWhere('auteurs', 'LIKE', "%{$query}%")
                  ->orWhere('discipline', 'LIKE', "%{$query}%")
                  ->orWhere('thematique', 'LIKE', "%{$query}%")
                  ->orWhere('resume', 'LIKE', "%{$query}%");
            })
            ->select('id', 'titre', 'resume', 'auteurs', 'responsible', 'discipline', 'thematique', 'creation_date', 'created_at')
            ->latest()
            ->get()
            ->map(function ($fiche) {
                $fiche->type = 'Fiche';
                return $fiche;
            });

        // === Fusion des résultats ===
        $publications = $articles->concat($fiches)->sortByDesc('created_at');

        // === Thématiques pour la colonne droite ===
        $thematiques = Thematique::withCount(['articles', 'fiches'])->get();

        return view('welcome', compact('publications', 'thematiques', 'query'));
    }
}








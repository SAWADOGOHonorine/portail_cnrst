<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Article;
use App\Models\Fiche;
use App\Models\Thematique;
use Illuminate\Pagination\LengthAwarePaginator;

class PublicationController extends Controller
{
    /**
     * Page publique combinant Articles publiés + Fiches validées
     */
    public function index(Request $request)
    {
        $query = $request->input('q');         
        $filterType = $request->input('type'); 

        $combined = collect();

        // ---------------- Articles publiés ----------------
        $articlesQuery = Article::where('status', 'published')->latest();

        if ($query) {
            $articlesQuery->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('author', 'like', "%{$query}%");
            });
        }

        if ($filterType && $filterType !== 'article') {
            $articlesQuery = collect(); // ignore les articles si filtre différent
        } else {
            $articlesQuery = $articlesQuery->get();
        }

        foreach ($articlesQuery as $article) {
            $combined->push([
                'type' => 'article',
                'data' => $article  // <- garder objet Eloquent
            ]);
        }

        // ---------------- Fiches validées ----------------
        $fichesQuery = Fiche::where('status', 'validated')->latest();

        if ($query) {
            $fichesQuery->where(function($q) use ($query) {
                $q->where('record_type', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            });
        }

        if ($filterType && $filterType !== 'fiche') {
            $fichesQuery = collect(); // ignore fiches si filtre différent
        } else {
            $fichesQuery = $fichesQuery->get();
        }

        foreach ($fichesQuery as $fiche) {
            $combined->push([
                'type' => 'fiche',
                'data' => $fiche  
            ]);
        }

        // ---------------- Trier par date descendante ----------------
        $combined = $combined->sortByDesc(fn($item) => $item['data']->created_at)->values();

        // ---------------- Pagination manuelle (10 par page) ----------------
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $items = $combined->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator(
            $items,
            $combined->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        // ---------------- Récupérer les thématiques ----------------
        $thematiques = Thematique::withCount('publications')->get();

        // ---------------- Retourner la vue ----------------
        return view('publications.index', [
            'combined' => $paginated,
            'totalCount' => $combined->count(),
            'thematiques' => $thematiques,
        ]);
    }

    /**
     * Affichage d'une publication spécifique
     */
    public function show($id)
    {
        // On cherche l'article ou la fiche publiquement accessible
        $publication = Publication::with('thematique')->findOrFail($id);

        return view('publications.show', compact('publication'));
    }
}












<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Article;
use App\Models\Fiche;
use Illuminate\Pagination\LengthAwarePaginator;

class PublicationController extends Controller
{
    /**
     * Page publique combinant Articles publiés + Fiches validées
     */
    public function index(Request $request)
    {
        $query = $request->input('q');         // Recherche texte
        $filterType = $request->input('type'); // Filtre type : article ou fiche

        $combined = collect();

        //  Articles publiés
        $articlesQuery = Article::where('status', 'published')->latest();

        if ($query) {
            $articlesQuery->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('author', 'like', "%{$query}%");
            });
        }

        if ($filterType && $filterType !== 'article') {
            $articlesQuery = collect(); // ignore les articles si type != article
        } else {
            $articlesQuery = $articlesQuery->get();
        }

        foreach ($articlesQuery as $article) {
            $combined->push([
                'type' => 'article',
                'data' => [
                    'id' => $article->id,
                    'titre' => $article->title,
                    'journal' => $article->journal,
                    'annee' => $article->publication_year,
                    'auteurs' => $article->author,
                    'co_auteurs' => $article->co_authors,
                    'summary' => $article->summary,
                    'url' => $article->url,
                    'fichier' => $article->fichier,
                    'created_at' => $article->publication_date ?? $article->created_at,
                    'status' => $article->status,
                ]
            ]);
        }

        //  Fiches validées
        $fichesQuery = Fiche::where('status', 'validated')->latest();

        if ($query) {
            $fichesQuery->where(function($q) use ($query) {
                $q->where('record_type', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            });
        }

        if ($filterType && $filterType !== 'fiche') {
            $fichesQuery = collect(); // ignore fiches si type != fiche
        } else {
            $fichesQuery = $fichesQuery->get();
        }

        foreach ($fichesQuery as $fiche) {
            $combined->push([
                'type' => 'fiche',
                'data' => [
                    'id' => $fiche->id,
                    'titre' => $fiche->record_type,
                    'description' => $fiche->content,
                    'responsable' => $fiche->responsible,
                    'url' => $fiche->url,
                    'fichier' => $fiche->fichier,
                    'created_at' => $fiche->creation_date ?? $fiche->created_at,
                ]
            ]);
        }

        //  Trier par date descendante et réindexer
        $combined = $combined->sortByDesc(function ($item) {
            return $item['data']['created_at'];
        })->values();

        // 4️⃣ Compter le nombre total de publications
        $totalCount = $combined->count();

        // 5️⃣ Pagination manuelle (6 par page)
        $perPage = 6;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $items = $combined->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator(
            $items,
            $combined->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(), // garde les filtres dans la pagination
            ]
        );

        // 6️⃣ Retourner la vue avec pagination et total
        return view('publications.index', [
            'combined' => $paginated,
            'totalCount' => $totalCount,
        ]);
    }
    public function show($id)
    {
        // Récupère la publication avec sa thématique
        $publication = Publication::with('thematique')->findOrFail($id);

        // Retourne la vue show avec la publication
        return view('publications.show', compact('publication'));
    }
}












<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Fiche;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleController extends Controller
{
    /**
     * Affiche la liste des articles de l'utilisateur connecté (dashboard privé).
     */
    public function index()
    {
        // Pagination : 6 articles par page
        $articles = Article::where('user_id', auth()->id())->latest()->paginate(6);

        return view('mon_espace.articles', compact('articles'));
    }
    // affiche le formulaire d'ajout d'un article
    public function create()
    {
        return view('mon_espace.article_create');
    }

    /**
     * Enregistre un nouvel article (dashboard privé).
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'journal'           => 'nullable|string|max:255',
            'publication_year'  => 'nullable|integer|min:1900|max:' . date('Y'),
            'url'               => 'nullable|url',
            'summary'           => 'nullable|string',
            'author'            => 'nullable|string|max:255',
            'co_authors'        => 'nullable|string|max:255',
            'publication_date'  => 'nullable|date',
            'status'            => 'required|in:submitted,accepted,published',
            'fichier'           => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $data['user_id'] = auth()->id();

        if ($request->hasFile('fichier')) {
            $data['fichier'] = $request->file('fichier')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route('articles.index')->with('success', '✅ Article enregistré avec succès !');
    }

    /**
     * Affiche le formulaire de modification d'un article (dashboard privé).
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('update', $article);

        return view('mon_espace.article_edit', compact('article'));
    }

    /**
     * Met à jour un article (dashboard privé).
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('update', $article);

        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'journal'           => 'nullable|string|max:255',
            'publication_year'  => 'nullable|integer|min:1900|max:' . date('Y'),
            'url'               => 'nullable|url',
            'summary'           => 'nullable|string',
            'author'            => 'nullable|string|max:255',
            'co_authors'        => 'nullable|string|max:255',
            'publication_date'  => 'nullable|date',
            'status'            => 'required|in:submitted,accepted,published',
            'fichier'           => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        if ($request->hasFile('fichier')) {
            $validated['fichier'] = $request->file('fichier')->store('articles', 'public');
        }

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', '✏️ Article modifié avec succès !');
    }

    /**
     * Supprime un article (dashboard privé).
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()->route('articles.index')->with('success', '🗑 Article supprimé avec succès !');
    }

    /**
     * Télécharge un fichier attaché (dashboard privé).
     */
    public function download($id)
    {
        $article = Article::findOrFail($id);

        if ($article->user_id !== auth()->id()) {
            abort(403);
        }

        return response()->download(storage_path('app/public/' . $article->fichier));
    }

    /**
     * Affiche la liste publique combinée Articles + Fiches (site web public).
     */
    public function publicIndex(Request $request)
    {
        // Récupère les articles publiés
        $articles = Article::where('status', 'published')->latest()->get();

        // Récupère toutes les fiches publiques
        $fiches = Fiche::latest()->get();

        // Combine les deux collections avec un type
        $combined = collect();

        foreach ($articles as $article) {
            $combined->push([
                'type' => 'article',
                'data' => $article
            ]);
        }

        foreach ($fiches as $fiche) {
            $combined->push([
                'type' => 'fiche',
                'data' => $fiche
            ]);
        }

        // Tri par date de création décroissante
        $combined = $combined->sortByDesc(fn($item) => $item['data']->created_at);

        // Pagination manuelle (6 items par page)
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 6;
        $currentItems = $combined->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedCombined = new LengthAwarePaginator(
            $currentItems,
            $combined->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('publications.index', ['combined' => $paginatedCombined]);
    }

    /**
     * Affiche un article individuel public
     */
    public function show($id)
    {
        $article = Article::where('status', 'published')->findOrFail($id);
        return view('publications.show', compact('article'));
    }
}


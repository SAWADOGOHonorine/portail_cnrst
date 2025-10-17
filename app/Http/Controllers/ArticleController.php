<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Fiche;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleController extends Controller
{
    // Page principale avec formulaire (dashboard privé)
    public function index()
    {
        $articles = Article::where('user_id', auth()->id())->latest()->paginate(6);
        return view('mon_espace.articles', compact('articles'));
    }

    // Affiche le formulaire d'ajout
    public function create()
    {
        return view('mon_espace.article_create');
    }

    // Enregistre un nouvel article
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

        return redirect()->route('articles.listes')
                         ->with('success', ' Article enregistré avec succès !');
    }

    // Page liste des articles (sans formulaire)
    public function listes()
    {
        $articles = Article::where('user_id', auth()->id())->latest()->paginate(6);
        return view('mon_espace.articles_listes', compact('articles'));
    }

    // Affiche le formulaire de modification
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('update', $article);

        return view('mon_espace.article_edit', compact('article'));
    }

    // Met à jour un article
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

        return redirect()->route('articles.listes')
                         ->with('success', '✏️ Article modifié avec succès !');
    }

    // Supprime un article
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()->route('articles.listes')
                         ->with('success', '🗑 Article supprimé avec succès !');
    }

    // Télécharge un fichier attaché
    public function download($id)
    {
        $article = Article::findOrFail($id);

        if ($article->user_id !== auth()->id()) {
            abort(403);
        }

        return response()->download(storage_path('app/public/' . $article->fichier));
    }

    // Affiche la liste publique combinée Articles + Fiches
    public function publicIndex(Request $request)
    {
        $articles = Article::where('status', 'published')->latest()->get();
        $fiches   = Fiche::latest()->get();

        $combined = collect();

        foreach ($articles as $article) {
            $combined->push([
                'type' => 'article',
                'data' => $article // <-- objet Eloquent
            ]);
        }

        foreach ($fiches as $fiche) {
            $combined->push([
                'type' => 'fiche',
                'data' => $fiche // <-- objet Eloquent
            ]);
        }

        $combined = $combined->sortByDesc(fn($item) => $item['data']->created_at);

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
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('mon_espace.articles.show', compact('article'));
    }


    // Affiche un article individuel public
    public function showPublic($id)
    {
        $article = Article::where('id', $id)
                          ->where('status', 'published')
                          ->firstOrFail();

        return view('publications.articles_detail', compact('article'));
    }
}




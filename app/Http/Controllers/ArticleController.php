<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

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
     * Affiche la liste publique des publications (site web public).
     */
    public function publicIndex()
    {
        // Seuls les articles publiés sont visibles au public
        $publications = Article::where('status', 'published')
                               ->latest()
                               ->paginate(6);

        // Passe la variable $publications à la vue
        return view('publications.index', compact('publications'));
    }
}


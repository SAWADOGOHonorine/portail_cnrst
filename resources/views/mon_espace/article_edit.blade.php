

<link rel="stylesheet" href="{{ asset('css/mon_espace/article_edit.css') }}">

<div class="container">

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>✏️ Modifier l'article</h2>

    {{-- Bouton retour à la liste --}}
    <a href="{{ route('articles.listes') }}" class="btn-outline-secondary">↩️ Retour à la liste</a>

    <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ old('title', $article->title) }}" placeholder="Titre de l'article" required class="form-control">
        <input type="text" name="journal" value="{{ old('journal', $article->journal) }}" placeholder="Journal" class="form-control">
        <input type="number" name="publication_year" value="{{ old('publication_year', $article->publication_year) }}" placeholder="Année de publication" class="form-control">
        <input type="url" name="url" value="{{ old('url', $article->url) }}" placeholder="Lien URL" class="form-control">
        <textarea name="summary" placeholder="Résumé" class="form-control" rows="3">{{ old('summary', $article->summary) }}</textarea>
        <input type="text" name="author" value="{{ old('author', $article->author) }}" placeholder="Auteur principal" class="form-control">
        <input type="text" name="co_authors" value="{{ old('co_authors', $article->co_authors) }}" placeholder="Co-auteurs" class="form-control">
        <input type="date" name="publication_date" value="{{ old('publication_date', $article->publication_date) }}" class="form-control">

        <select name="status" class="form-control">
            <option value="submitted" @selected($article->status == 'submitted')>Soumis</option>
            <option value="accepted" @selected($article->status == 'accepted')>Accepté</option>
            <option value="published" @selected($article->status == 'published')>Publié</option>
        </select>

        <label>📄 Fichier joint (optionnel)</label>
        <input type="file" name="fichier" class="form-control">

        @if($article->fichier)
            <div class="fichier-actuel">
                <a href="{{ asset('storage/' . $article->fichier) }}" target="_blank" class="btn btn-outline-secondary btn-sm">📄 Télécharger le fichier actuel</a>
            </div>
        @endif

        <button type="submit" class="btn-success">💾 Enregistrer les modifications</button><br><br>
        
    </form>

</div>








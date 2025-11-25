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

        <label for="title">Titre de l'article</label>
        <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" placeholder="Titre de l'article" required class="form-control">

        <label for="journal">Journal</label>
        <input type="text" id="journal" name="journal" value="{{ old('journal', $article->journal) }}" placeholder="Journal" class="form-control">

        <label for="publication_year">Année de publication</label>
        <input type="number" id="publication_year" name="publication_year" value="{{ old('publication_year', $article->publication_year) }}" placeholder="Année de publication" class="form-control">

        <label for="url">Lien URL</label>
        <input type="url" id="url" name="url" value="{{ old('url', $article->url) }}" placeholder="Lien URL" class="form-control">

        <label for="summary">Résumé</label>
        <textarea id="summary" name="summary" placeholder="Résumé" class="form-control" rows="3">{{ old('summary', $article->summary) }}</textarea>

        <label for="author">Auteur principal</label>
        <input type="text" id="author" name="author" value="{{ old('author', $article->author) }}" placeholder="Auteur principal" class="form-control">

        <label for="co_authors">Co-auteurs</label>
        <input type="text" id="co_authors" name="co_authors" value="{{ old('co_authors', $article->co_authors) }}" placeholder="Co-auteurs" class="form-control">

        <label for="publication_date">Date de publication</label>
        <input type="date" id="publication_date" name="publication_date" value="{{ old('publication_date', $article->publication_date) }}" class="form-control">

        <label for="status">Statut</label>
        <select id="status" name="status" class="form-control">
            <option value="submitted" @selected($article->status == 'submitted')>Soumis</option>
            <option value="accepted" @selected($article->status == 'accepted')>Accepté</option>
            <option value="published" @selected($article->status == 'published')>Publié</option>
        </select>

        <label for="fichier">📄 Fichier joint (optionnel)</label>
        <input type="file" id="fichier" name="fichier" class="form-control">

        @if($article->fichier)
            <div class="fichier-actuel">
                <a href="{{ asset('storage/' . $article->fichier) }}" target="_blank" class="btn btn-outline-secondary btn-sm">📄 Télécharger le fichier actuel</a>
            </div>
        @endif

        <button type="submit" class="btn-success">💾 Enregistrer les modifications</button><br><br>
    </form>

</div>








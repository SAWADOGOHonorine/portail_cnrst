<link rel="stylesheet" href="{{ asset('css/mon_espace/article_create.css') }}">

<div class="container">

    <h2>Ajouter un nouvel article</h2>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('articles.listes') }}" class="btn-outline-secondary">↩️ Retour à la liste</a>

    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="title">Titre de l'article</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Titre de l'article" required class="form-control">

        <label for="journal">Journal</label>
        <input type="text" id="journal" name="journal" value="{{ old('journal') }}" placeholder="Journal" class="form-control">

        <label for="publication_year">Année de publication</label>
        <input type="number" id="publication_year" name="publication_year" value="{{ old('publication_year') }}" placeholder="Année de publication" class="form-control">

        <label for="url">Lien URL</label>
        <input type="url" id="url" name="url" value="{{ old('url') }}" placeholder="Lien URL" class="form-control">

        <label for="summary">Résumé</label>
        <textarea id="summary" name="summary" placeholder="Résumé" class="form-control" rows="3">{{ old('summary') }}</textarea>

        <label for="author">Auteur principal</label>
        <input type="text" id="author" name="author" value="{{ old('author') }}" placeholder="Auteur principal" class="form-control">

        <label for="co_authors">Co-auteurs</label>
        <input type="text" id="co_authors" name="co_authors" value="{{ old('co_authors') }}" placeholder="Co-auteurs" class="form-control">

        <label for="publication_date">Date de publication</label>
        <input type="date" id="publication_date" name="publication_date" value="{{ old('publication_date') }}" class="form-control">

        <label for="status">Statut</label>
        <select id="status" name="status" class="form-control">
            <option value="submitted">Soumis</option>
            <option value="accepted">Accepté</option>
            <option value="published">Publié</option>
        </select>

        <label for="fichier">📄 Fichier joint (optionnel)</label>
        <input type="file" id="fichier" name="fichier" class="form-control">

        <button type="submit" class="btn-success">💾 Enregistrer l'article</button>
    </form>
</div>

{{-- Script alert auto-disparition --}}
<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }
    }, 4000);
</script>



<link rel="stylesheet" href="{{ asset('css/mon_espace/article_create.css') }}">

<div class="container">

    <h2> Ajouter un nouvel article</h2>
    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('articles.index') }}" class="btn-outline-secondary">↩️ Retour à la liste</a>

    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" value="{{ old('title') }}" placeholder="Titre de l'article" required class="form-control">
        <input type="text" name="journal" value="{{ old('journal') }}" placeholder="Journal" class="form-control">
        <input type="number" name="publication_year" value="{{ old('publication_year') }}" placeholder="Année de publication" class="form-control">
        <input type="url" name="url" value="{{ old('url') }}" placeholder="Lien URL" class="form-control">
        <textarea name="summary" placeholder="Résumé" class="form-control" rows="3">{{ old('summary') }}</textarea>
        <input type="text" name="author" value="{{ old('author') }}" placeholder="Auteur principal" class="form-control">
        <input type="text" name="co_authors" value="{{ old('co_authors') }}" placeholder="Co-auteurs" class="form-control">
        <input type="date" name="publication_date" value="{{ old('publication_date') }}" class="form-control">

        <select name="status" class="form-control">
            <option value="submitted">Soumis</option>
            <option value="accepted">Accepté</option>
            <option value="published">Publié</option>
        </select>

        <label>📄 Fichier joint (optionnel)</label>
        <input type="file" name="fichier" class="form-control">

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

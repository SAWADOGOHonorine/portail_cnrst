<link rel="stylesheet" href="{{ asset('css/mon_espace/article.css') }}">

<div class="article-wrapper">
    <h2>📝 Mes articles</h2>

    {{-- Formulaire d’ajout --}}
    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data" class="form-article mt-4">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titre de l'article</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="journal" class="form-label">Journal</label>
            <input type="text" id="journal" name="journal" class="form-control">
        </div>

        <div class="mb-3">
            <label for="publication_year" class="form-label">Année de publication</label>
            <input type="number" id="publication_year" name="publication_year" class="form-control">
        </div>

        <div class="mb-3">
            <label for="publication_date" class="form-label">Date de publication</label>
            <input type="date" id="publication_date" name="publication_date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Lien URL</label>
            <input type="url" id="url" name="url" class="form-control">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Auteur principal</label>
            <input type="text" id="author" name="author" class="form-control">
        </div>

        <div class="mb-3">
            <label for="co_authors" class="form-label">Co-auteurs</label>
            <input type="text" id="co_authors" name="co_authors" class="form-control">
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">Résumé</label>
            <textarea id="summary" name="summary" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select id="status" name="status" class="form-control">
                <option value="submitted">Soumis</option>
                <option value="accepted">Accepté</option>
                <option value="published">Publié</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fichier" class="form-label">Fichier (PDF, Word...)</label>
            <input type="file" id="fichier" name="fichier" class="form-control">
        </div>

        <button type="submit" class="btn-enregistrer mt-3">📥 Enregistrer</button>
    </form>
</div>







<link rel="stylesheet" href="{{ asset('css/mon_espace/article.css') }}">

<div class="container mt-4">
    <h2 class="mb-4"> Mes articles</h2>

    {{-- Formulaire d'ajout --}}
    <form method="POST" action="{{ route('articles.store') }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" name="title" placeholder="Titre de l'article" required class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="journal" placeholder="Journal" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="number" name="publication_year" placeholder="Année de publication" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="date" name="publication_date" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="url" name="url" placeholder="Lien URL" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="author" placeholder="Auteur principal" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="co_authors" placeholder="Co-auteurs" class="form-control">
            </div>
            <div class="col-12">
                <textarea name="summary" placeholder="Résumé" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-12">
                <select name="status" class="form-control">
                    <option value="submitted">Soumis</option>
                    <option value="accepted">Accepté</option>
                    <option value="published">Publié</option>
                </select>
            </div>
            <div class="col-12">
                <input type="file" name="fichier" class="form-control mt-2">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success mt-2">📥 Enregistrer</button>
            </div>
        </div>
    </form>

   







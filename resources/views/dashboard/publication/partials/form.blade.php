<form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="titre">Titre *</label>
        <input type="text" name="titre" id="titre" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="auteurs">Auteurs</label>
        <input type="text" name="auteurs" id="auteurs" class="form-control">
    </div>

    <div class="form-group">
        <label for="annee">Année</label>
        <input type="number" name="annee" id="annee" class="form-control" min="1900" max="{{ date('Y') }}">
    </div>

    <div class="form-group">
        <label for="theme">Thématique</label>
        <input type="text" name="theme" id="theme" class="form-control">
    </div>

    <div class="form-group">
        <label for="resume">Résumé</label>
        <textarea name="resume" id="resume" class="form-control" rows="4"></textarea>
    </div>

    <div class="form-group">
        <label for="mots_cles">Mots-clés</label>
        <input type="text" name="mots_cles" id="mots_cles" class="form-control">
    </div>

    <div class="form-group">
        <label for="source">Source</label>
        <input type="text" name="source" id="source" class="form-control">
    </div>

    <div class="form-group">
        <label for="lien_externe">Lien externe</label>
        <input type="url" name="lien_externe" id="lien_externe" class="form-control">
    </div>

    <!-- <div class="form-group">
        <label for="fichier">Fichier PDF</label>
        <input type="file" name="fichier" id="fichier" class="form-control" accept=".pdf">
    </div> -->

    <button type="submit" class="btn btn-primary">📤 Enregistrer</button>
</form>

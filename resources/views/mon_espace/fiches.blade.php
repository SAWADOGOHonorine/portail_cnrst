<link rel="stylesheet" href="{{ asset('css/mon_espace/fiche.css') }}">

<div class="fiche-technique-wrapper">
    <h2>📄 Mes fiches techniques</h2>

    {{-- Formulaire d’ajout --}}
    <form method="POST" action="{{ route('fiches.store') }}" enctype="multipart/form-data" class="form-fiche mt-4">
        @csrf

        <div class="mb-3">
            <label for="record_type" class="form-label">Type d’enregistrement</label>
            <input type="text" id="record_type" name="record_type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="titre" class="form-label">Titre de la fiche</label>
            <input type="text" id="titre" name="titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="resume" class="form-label">Résumé synthétique</label>
            <textarea id="resume" name="resume" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description complète</label>
            <textarea id="description" name="description" class="form-control" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label for="auteurs" class="form-label">Auteurs</label>
            <input type="text" id="auteurs" name="auteurs" class="form-control">
        </div>

        <div class="mb-3">
            <label for="annee" class="form-label">Année / Version</label>
            <input type="text" id="annee" name="annee" class="form-control">
        </div>

        <div class="mb-3">
            <label for="discipline" class="form-label">Discipline</label>
            <input type="text" id="discipline" name="discipline" class="form-control">
        </div>

        <div class="mb-3">
            <label for="thematique" class="form-label">Thématique</label>
            <input type="text" id="thematique" name="thematique" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mots_cles" class="form-label">Mots clés</label>
            <input type="text" id="mots_cles" name="mots_cles" class="form-control">
        </div>

        <div class="mb-3">
            <label for="source" class="form-label">Ouvrage / Source / Références</label>
            <textarea id="source" name="source" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Lien externe</label>
            <input type="url" id="url" name="url" class="form-control">
        </div>

        <div class="mb-3">
            <label for="fichier" class="form-label">Fichier (PDF, Word...)</label>
            <input type="file" id="fichier" name="fichier" class="form-control">
        </div>

        <button type="submit" class="btn-enregistrer mt-3">💾 Enregistrer</button>
    </form>
</div>


   



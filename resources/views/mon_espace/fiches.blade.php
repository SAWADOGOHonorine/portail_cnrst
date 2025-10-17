<link rel="stylesheet" href="{{ asset('css/mon_espace/fiche.css') }}">

<div class="fiche-technique-wrapper">
    <h2>Mes fiches techniques</h2>

    {{-- Formulaire d’ajout --}}
    <form method="POST" action="{{ route('fiches.store') }}" enctype="multipart/form-data" class="form-fiche mt-4">
        @csrf
        <input type="text" name="record_type" placeholder="Type d’enregistrement" class="form-control mt-2" required>
        <input type="text" name="titre" placeholder="Titre de la fiche" class="form-control mt-2" required>
        <textarea name="resume" placeholder="Résumé synthétique" class="form-control mt-2" rows="3"></textarea>
        <textarea name="description" placeholder="Description complète" class="form-control mt-2" rows="5"></textarea>

        <input type="text" name="auteurs" placeholder="Auteurs" class="form-control mt-2">
        <input type="text" name="annee" placeholder="Année / Version" class="form-control mt-2">

        {{-- Discipline --}}
        <input type="text" name="discipline" placeholder="Discipline" class="form-control mt-2">

        {{-- Thématique --}}
        <input type="text" name="thematique" placeholder="Thématique" class="form-control mt-2">

        <input type="text" name="mots_cles" placeholder="Mots clés" class="form-control mt-2">
        <textarea name="source" placeholder="Ouvrage / Source / Références" class="form-control mt-2" rows="3"></textarea>
        <input type="url" name="url" placeholder="Lien externe" class="form-control mt-2">
        <input type="file" name="fichier" class="form-control mt-2">

        <button type="submit" class="btn-enregistrer mt-3">Enregistrer</button>
    </form>
</div>

   



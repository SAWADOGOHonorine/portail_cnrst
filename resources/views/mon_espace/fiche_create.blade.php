<link rel="stylesheet" href="{{ asset('css/mon_espace/fiche_create.css') }}">

<div class="container mt-4">

    <h2>➕ Ajouter une nouvelle fiche technique</h2>

    {{-- Bouton retour --}}
    <a href="{{ route('fiches.index') }}" class="btn btn-outline-secondary mb-3">
        ↩️ Retour à la liste
    </a>

    {{-- Alertes erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire d’ajout --}}
    <form method="POST" action="{{ route('fiches.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="titre">Titre de la fiche :</label>
            <input type="text" name="titre" id="titre" value="{{ old('titre') }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="record_type">Type d’enregistrement :</label>
            <input type="text" name="record_type" id="record_type" value="{{ old('record_type') }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Contenu technique :</label>
            <textarea name="content" id="content" class="form-control" rows="4" required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="creation_date">Date de création :</label>
            <input type="date" name="creation_date" id="creation_date" value="{{ old('creation_date') }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="url">Lien externe :</label>
            <input type="url" name="url" id="url" value="{{ old('url') }}" placeholder="https://exemple.com" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="responsible">Responsable :</label>
            <input type="text" name="responsible" id="responsible" value="{{ old('responsible') }}" class="form-control">
        </div>

        {{-- ✅ Bloc ajouté : document PDF ou DOC --}}
        <div class="form-group mb-3">
            <label for="document">📄 Document (PDF ou DOC) :</label>
            <input type="file" name="document" id="document" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        {{-- Champ fichier supplémentaire (optionnel) --}}
        <div class="form-group mb-3">
            <label for="fichier">📎 Fichier joint (optionnel) :</label>
            <input type="file" name="fichier" id="fichier" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-3">📥 Enregistrer la fiche</button>
    </form>
</div>


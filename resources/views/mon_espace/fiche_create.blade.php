
    <link rel="stylesheet" href="{{ asset('css/mon_espace/fiche_create.css') }}">

<div class="container mt-4">

    <h2> Ajouter une nouvelle fiche technique</h2>

    {{-- Bouton retour --}}
    <a href="{{ route('fiches.index') }}" class="btn btn-outline-secondary mb-3">
        ↩️ Retour à la liste
    </a>

    {{-- Alert erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('fiches.listes') }}" enctype="multipart/form-data">
        @csrf

        <input type="text" name="titre" placeholder="Titre de la fiche" class="form-control mt-2" required>

        <input type="text" name="record_type" value="{{ old('record_type') }}" placeholder="Type d’enregistrement" required class="form-control mt-2">

        <textarea name="content" placeholder="Contenu technique" required class="form-control mt-2" rows="4">{{ old('content') }}</textarea>

        <input type="date" name="creation_date" value="{{ old('creation_date') }}" class="form-control mt-2">

        <input type="url" name="url" value="{{ old('url') }}" placeholder="Lien externe" class="form-control mt-2">

        <input type="text" name="responsible" value="{{ old('responsible') }}" placeholder="Responsable" class="form-control mt-2">

        <label class="mt-2">📄 Fichier joint (optionnel)</label>
        <input type="file" name="fichier" class="form-control">

        <button type="submit" class="btn btn-success mt-3">📥 Enregistrer la fiche</button>
    </form>
</div>



<link rel="stylesheet" href="{{ asset('css/mon_espace/fiche_edit.css') }}">
<div class="container">
     @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Modifier la fiche</h2>

    <!-- Bouton Retour à la liste -->
    <a href="{{ route('fiches.listes') }}" class="btn btn-secondary mb-3">↩️ Retour à la liste</a>

    <form action="{{ route('fiches.update', $fiche->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="record_type">Type de fiche</label>
            <input type="text" name="record_type" id="record_type" class="form-control" value="{{ old('record_type', $fiche->record_type) }}">
        </div>

        <div class="mb-3">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control">{{ old('content', $fiche->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="fichier">Fichier (PDF, DOC, DOCX)</label>
            <input type="file" name="fichier" id="fichier" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>



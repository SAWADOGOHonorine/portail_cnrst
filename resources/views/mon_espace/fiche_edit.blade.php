<link rel="stylesheet" href="{{ asset('css/mon_espace/fiche_edit.css') }}">

<div class="container mt-4">

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>✏️ Modifier la fiche</h2>

    {{-- Bouton retour --}}
    <a href="{{ route('fiches.listes') }}" class="btn btn-outline-secondary mb-3">
        ↩️ Retour à la liste
    </a>

    {{-- Formulaire de modification --}}
    <form action="{{ route('fiches.update', $fiche->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Type de fiche --}}
        <div class="form-group mb-3">
            <label for="record_type">Type de fiche :</label>
            <input 
                type="text" 
                name="record_type" 
                id="record_type" 
                class="form-control" 
                value="{{ old('record_type', $fiche->record_type) }}" 
                required>
        </div>

        {{-- Contenu --}}
        <div class="form-group mb-3">
            <label for="content">Contenu :</label>
            <textarea 
                name="content" 
                id="content" 
                class="form-control" 
                rows="5">{{ old('content', $fiche->content) }}</textarea>
        </div>

        {{-- Fichier principal --}}
        <div class="form-group mb-3">
            <label for="fichier">📎 Fichier (PDF, DOC, DOCX) :</label>
            <input 
                type="file" 
                name="fichier" 
                id="fichier" 
                class="form-control" 
                accept=".pdf,.doc,.docx">
            @if($fiche->fichier)
                <small class="text-success">
                    📄 Fichier actuel : 
                    <a href="{{ asset('storage/fiches/'.$fiche->fichier) }}" target="_blank">
                        {{ $fiche->fichier }}
                    </a>
                </small>
            @endif
        </div>

        {{-- Nouveau champ Document --}}
        <div class="form-group mb-3">
            <label for="document">📄 Document (PDF ou DOC) :</label>
            <input 
                type="file" 
                name="document" 
                id="document" 
                class="form-control" 
                accept=".pdf,.doc,.docx">
            @if($fiche->document ?? false)
                <small class="text-success">
                    🔗 Document actuel :
                    <a href="{{ asset('storage/fiches/'.$fiche->document) }}" target="_blank">
                        {{ $fiche->document }}
                    </a>
                </small>
            @endif
        </div>

        {{-- Bouton de validation --}}
        <button type="submit" class="btn btn-success">
            💾 Enregistrer les modifications
        </button>
    </form>
</div>



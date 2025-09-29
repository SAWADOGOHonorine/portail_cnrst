<div class="fiche-technique-wrapper">
    <h2>📝 Mes fiches techniques</h2>

    {{-- Alert success --}}
    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire --}}
    <form method="POST" action="{{ route('fiches.store') }}" enctype="multipart/form-data" class="mt-4">
        @csrf

        <input type="text" name="record_type" placeholder="Type d’enregistrement" required class="form-control mt-2">
        <textarea name="content" placeholder="Contenu technique" required class="form-control mt-2" rows="4"></textarea>
        <input type="date" name="creation_date" class="form-control mt-2">
        <input type="url" name="url" placeholder="Lien externe" class="form-control mt-2">
        <input type="text" name="responsible" placeholder="Responsable" class="form-control mt-2">

        {{-- Fichier --}}
        <input type="file" name="fichier" class="form-control mt-2">

        <button type="submit" class="btn btn-success mt-3">📥 Enregistrer</button>
    </form>

    {{-- Liste des fiches --}}
    <div class="fiche-list mt-5">
        @forelse($fiches as $fiche)
            <div class="fiche-card mb-3 p-3 border rounded shadow-sm">
                <h5 class="mb-2">{{ $fiche->record_type }}</h5>
                <p>{{ $fiche->content }}</p>

                <p><strong>Responsable :</strong> {{ $fiche->responsible ?? 'N/A' }}</p>
                <p><strong>Date de création :</strong> {{ $fiche->creation_date ?? 'Non renseignée' }}</p>

                <p>
                    <strong>Status :</strong>
                    <span class="badge bg-success">✅ Validée</span>
                </p>

                @if($fiche->url)
                    <p>
                        <a href="{{ $fiche->url }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                            🔗 Lien externe
                        </a>
                    </p>
                @endif

                @if($fiche->fichier)
                    <a href="{{ asset('storage/' . $fiche->fichier) }}" class="btn btn-outline-primary btn-sm" download>
                        📎 Télécharger le fichier
                    </a>
                @endif

                {{-- Boutons Modifier / Supprimer --}}
                <div class="mt-3 d-flex gap-2">
                    <a href="{{ route('fiches.edit', $fiche->id) }}" class="btn btn-outline-success btn-sm">
                        ✏️ Modifier
                    </a>

                    <form action="{{ route('fiches.destroy', $fiche->id) }}" method="POST" onsubmit="return confirm('Supprimer cette fiche ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            🗑 Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-muted">⚠️ Aucune fiche technique enregistrée pour le moment.</p>
        @endforelse
    </div>
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




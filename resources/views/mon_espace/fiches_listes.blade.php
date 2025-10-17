<link rel="stylesheet" href="{{ asset('css/mon_espace/fiches_listes.css') }}">

<div class="container mt-4">

    <h2 class="mb-4 text-center">Mes fiches techniques</h2>

    {{-- Bouton Ajouter centré --}}
    <div class="text-center mb-4">
        <a href="{{ route('fiches.create') }}" class="btn btn-outline-success">➕ Ajouter une fiche</a>
    </div>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Messages d’erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Liste des fiches --}}
    @if($fiches->count() > 0)
        <div class="fiche-list">
            @foreach($fiches as $fiche)
                <div class="fiche-card">
                    <h5 class="fiche-title">{{ $fiche->titre }}</h5>

                    <p class="fiche-content"><strong>Résumé :</strong> {{ $fiche->resume ?? 'Non renseigné' }}</p>
                    <p class="fiche-content"><strong>Détails :</strong> {{ $fiche->content ?? 'Non renseigné' }}</p>
                    <p><strong>Auteur(s) :</strong> {{ $fiche->auteurs ?? 'Non renseigné' }}</p>
                    <p><strong>Discipline :</strong> {{ $fiche->discipline ?? 'Non renseignée' }}</p>
                    <p><strong>Année :</strong> {{ $fiche->annee ?? 'Non renseignée' }}</p>
                    <p><strong>Thématique :</strong> {{ $fiche->thematique ?? 'Non renseignée' }}</p>
                    <p><strong>Mots-clés :</strong> {{ $fiche->mots_cles ?? 'Non renseignés' }}</p>
                    <p><strong>Références :</strong> {{ $fiche->references ?? 'Non renseignées' }}</p>
                    <p><strong>Date de création :</strong> {{ $fiche->created_at->format('d/m/Y') }}</p>

                    {{-- Status dynamique --}}
                    <p>
                        <strong>Status :</strong>
                        @if($fiche->status == 'validée')
                            <span class="badge bg-success">✅ Validée</span>
                        @elseif($fiche->status == 'en attente')
                            <span class="badge bg-warning">⏳ En attente</span>
                        @else
                            <span class="badge bg-secondary">❌ Non validée</span>
                        @endif
                    </p>

                    {{-- Fichier --}}
                    @if($fiche->fichier)
                        <a href="{{ asset('storage/' . $fiche->fichier) }}" class="btn btn-outline-secondary btn-download" download>📎 Télécharger le fichier</a>
                    @endif

                    {{-- Actions --}}
                    <div class="fiche-actions">
                        <a href="{{ route('fiches.edit', $fiche->id) }}" class="btn btn-outline-primary">✏️ Modifier</a>
                        <form action="{{ route('fiches.destroy', $fiche->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette fiche ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">🗑 Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted text-center mt-4">⚠️ Aucune fiche technique enregistrée pour le moment.</p>
    @endif
</div>

{{-- Disparition automatique des alertes --}}
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

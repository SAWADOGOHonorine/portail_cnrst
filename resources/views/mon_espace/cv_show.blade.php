<link rel="stylesheet" href="{{ asset('css/mon_espace/cv_show.css') }}">

<div class="container mt-4">

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h2 class="mb-4">Informations du CV</h2>

    @if(isset($cv) && $cv)
        <div class="card p-4 shadow-sm">

            <p><strong>Nom :</strong> {{ $cv->nom }}</p>
            <p><strong>Prénom :</strong> {{ $cv->prenom }}</p>
            <p><strong>Email :</strong> {{ $cv->email }}</p>
            <p><strong>Téléphone :</strong> {{ $cv->telephone ?? '-' }}</p>
            <p><strong>WhatsApp :</strong> {{ $cv->whatsapp ?? '-' }}</p>
            <p><strong>Adresse :</strong> {{ $cv->adresse ?? '-' }}</p>
            <p><strong>Ville :</strong> {{ $cv->ville ?? '-' }}</p>
            <p><strong>Pays :</strong> {{ $cv->pays }}</p>
            <p><strong>Institut :</strong> {{ $cv->institut }}</p>
            <p><strong>Département :</strong> {{ $cv->departement }}</p>
            <p><strong>Spécialité :</strong> {{ $cv->specialite }}</p>
            <p><strong>Domaine :</strong> {{ $cv->domaine }}</p>
            <p><strong>Mot clé :</strong> {{ $cv->mot_cle ?? '-' }}</p>
            <p><strong>Date de naissance :</strong> {{ $cv->date_naissance ?? '-' }}</p>
            <p><strong>Lieu de naissance :</strong> {{ $cv->lieu_naissance ?? '-' }}</p>
            <p><strong>Détail scientifique :</strong> {{ $cv->detaille_scientifique ?? '-' }}</p>
            <p><strong>Projet de recherche :</strong> {{ $cv->projet_recherche ?? '-' }}</p>
            <p><strong>Genre :</strong> {{ $cv->genre ? ucfirst($cv->genre) : '-' }}</p>
            <p><strong>Thématique de recherche :</strong> {{ $cv->thematique_recherche ?? '-' }}</p>

            <hr>
            <h4>Fichier CV</h4>

            @if($cv->cv_path && file_exists(public_path('storage/' . $cv->cv_path)))
                <div class="d-flex justify-content-center flex-wrap gap-2 mb-3">
                    <!-- Voir le CV en PDF dans le navigateur -->
                    <a href="{{ route('cv.pdf', $cv->id) }}" class="btn btn-primary btn-sm" target="_blank">
                        📄 Voir le CV (PDF)
                    </a>

                    <!-- Télécharger le CV -->
                    <a href="{{ route('cv.pdf', $cv->id) }}" class="btn btn-success btn-sm" download>
                        ⬇ Télécharger le CV
                    </a>
                </div>
            @else
                <p class="text-danger text-center">Aucun fichier trouvé.</p>
            @endif
        </div>
    @else
        <div class="alert alert-warning">
            Vous n'avez pas encore de CV enregistré. 
            <a href="{{ route('cv.index') }}">Cliquez ici pour le créer</a>.
        </div>
    @endif

    <!-- Bouton Retour centré -->
    <div class="d-flex justify-content-center mt-3">
        <a href="{{ route('dashboard', ['from' => 'cv']) }}" class="btn btn-secondary btn-sm">
            ⬅ Retour
        </a>
    </div>
</div>


        
   

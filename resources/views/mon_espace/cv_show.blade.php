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
            <!-- <h4>Fichier CV</h4>

            @if($cv->cv_path && file_exists(public_path('storage/' . $cv->cv_path)))
                <div class="d-flex justify-content-center flex-wrap gap-2 mb-3">
                   
                    <a href="{{ route('cv.pdf', $cv->id) }}" class="btn btn-primary btn-sm" target="_blank">
                         Voir le fichier CV 
                    </a>
                    <a href="{{ route('cv.pdf', $cv->id) }}" class="btn btn-success btn-sm" download>
                        ⬇ Télécharger le fichier CV
                    </a>
                </div>
            @else
                <p class="text-danger text-center">Aucun fichier trouvé.</p>
            @endif
        </div>
    @else -->
        <div class="alert alert-warning">
            Vous n'avez pas encore de CV enregistré. 
            <a href="{{ route('cv.index') }}">Cliquez ici pour le créer</a>.
        </div>
    @endif <br>

    <hr>

<!-- Boutons principaux : Voir / Télécharger -->
<div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
    <a href="{{ route('cv.show', $cv->id) }}"
       class="btn btn-success px-4"
       target="_blank">
        👁️ Voir le CV
    </a>

    <a href="{{ route('cv.download', $cv->id) }}"
       class="btn btn-primary px-4">
         Télécharger le CV
    </a>
</div>

<!-- Boutons secondaires : Retour / Modifier -->
<div class="d-flex justify-content-center gap-2 mt-3 flex-wrap">
    <a href="{{ route('dashboard', ['from' => 'cv']) }}"
       class="btn btn-outline-success btn-sm">
        ⬅ Retour
    </a>

    <a href="{{ route('cv.edit', $cv->id) }}"
       class="btn btn-outline-warning btn-sm">
         Modifier le CV
    </a>
</div>


</div>

<style>
/* Bouton Retour : vert normal, vert foncé au hover */
.custom-retour {
    background-color: #28a745; 
    border-color: #28a745;
    color: #fff;
}
.custom-retour:hover {
    background-color: #218838; 
    border-color: #1e7e34;
}

/* Bouton Modifier : jaune/orange normal, bleu au hover */
.custom-modifier {
    background-color: #ffc107; 
    border-color: #ffc107;
    color: #212529;
}
.custom-modifier:hover {
    background-color: #007bff; 
    border-color: #007bff;
    color: #fff;
}

.btn {
    border-radius: 25px;
}

hr {
    margin-top: 30px;
    margin-bottom: 20px;
}

</style>


        
   

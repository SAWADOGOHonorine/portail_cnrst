<div class="card p-4">

    <h4 class="mb-3">CV de {{ $user->name }}</h4>

    @if($cv)

        <p><strong>Nom :</strong> {{ $cv->nom }}</p>
        <p><strong>Prénom :</strong> {{ $cv->prenom }}</p>
        <p><strong>Téléphone :</strong> {{ $cv->telephone }}</p>
        <p><strong>Email :</strong> {{ $cv->email }}</p>
        <p><strong>Adresse :</strong> {{ $cv->adresse }}</p>
        <p><strong>Compétences :</strong> {{ $cv->competences }}</p>
        <p><strong>Expériences :</strong> {{ $cv->experiences }}</p>

        <a href="{{ asset('storage/cv/' . $cv->fichier) }}" 
           class="btn btn-success mt-3" 
           download>
            Télécharger le CV (PDF)
        </a>

    @else
        <p class="text-danger">Aucun CV renseigné pour cet utilisateur.</p>
    @endif
</div>

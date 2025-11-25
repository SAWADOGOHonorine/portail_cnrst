<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CV de {{ $cv->nom }} {{ $cv->prenom }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h2 { text-align: center; }
        p { margin: 4px 0; }
        hr { margin: 10px 0; }
    </style>
</head>
<body>
    <h2>CV de {{ $cv->nom }} {{ $cv->prenom }}</h2>
    <hr>

    <p><strong>Email :</strong> {{ $cv->email }}</p>
    <p><strong>Téléphone :</strong> {{ $cv->telephone ?? '-' }}</p>
    <p><strong>WhatsApp :</strong> {{ $cv->whatsapp ?? '-' }}</p>
    <p><strong>Adresse :</strong> {{ $cv->adresse ?? '-' }}</p>
    <p><strong>Ville :</strong> {{ $cv->ville ?? '-' }}</p>
    <p><strong>Pays :</strong> {{ $cv->pays }}</p>
    <p><strong>Institut :</strong> {{ $cv->institut }}</p>
    <p><strong>Département :</strong> {{ $cv->departement }}</p>
    <p><strong>Spécialité :</strong> {{ $cv->specialite ?? '-' }}</p>
    <p><strong>Domaine :</strong> {{ $cv->domaine ?? '-' }}</p>
    <p><strong>Mot-clé :</strong> {{ $cv->mot_cle ?? '-' }}</p>
    <p><strong>Date de naissance :</strong> {{ $cv->date_naissance ?? '-' }}</p>
    <p><strong>Lieu de naissance :</strong> {{ $cv->lieu_naissance ?? '-' }}</p>
    <p><strong>Détail scientifique :</strong> {{ $cv->detaille_scientifique ?? '-' }}</p>
    <p><strong>Projet de recherche :</strong> {{ $cv->projet_recherche ?? '-' }}</p>
    <p><strong>Genre :</strong> {{ $cv->genre ?? '-' }}</p>
    <p><strong>Thématique recherche :</strong> {{ $cv->thematique_recherche ?? '-' }}</p>

    <hr>
    @if($cv->cv_path && file_exists(public_path('storage/'.$cv->cv_path)))
        <p><strong>Fichier uploadé :</strong> <a href="{{ asset('storage/'.$cv->cv_path) }}" target="_blank">Voir / Télécharger</a></p>
    @endif
</body>
</html>

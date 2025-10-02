@extends('layouts.app')

@section('titre', $publication->titre)

@section('content')
<div class="publication-detail">
    <h1>{{ $publication->titre }}</h1>
    <p><strong>Auteur :</strong> {{ $publication->auteur }}{{ $publication->co_auteurs ? ', ' . $publication->co_auteurs : '' }}</p>
    <p><strong>Année :</strong> {{ $publication->annee }}</p>
    <p><strong>Journal :</strong> {{ $publication->journal }}</p>
    <p><strong>Thématique :</strong> {{ $publication->thematique->nom ?? 'Sans thématique' }}</p>
    <p><strong>Résumé :</strong> {{ $publication->resume }}</p>
    <a href="{{ url('/') }}">← Retour à l'accueil</a>
</div>
@endsection

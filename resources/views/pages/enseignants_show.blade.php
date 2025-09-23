@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/enseignant_show.css') }}">
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')
<section class="profile-section">
    <div class="container">
        <h2 class="profile-name">Pr {{ $enseignant->nom }}</h2>
        <p class="profile-title">{{ $enseignant->titre }}</p>
        <p class="profile-role">{{ $enseignant->fonction }}</p>
        <p class="profile-specialite">{{ $enseignant->specialite }}</p>
        <p class="profile-status">{{ $enseignant->statut }}</p>

        <hr>

        <h3 class="section-heading">📚 Parcours académique</h3>
        <ul class="timeline">
            @foreach($enseignant->parcours as $etape)
                <li><strong>{{ $etape->annee }}</strong> — {{ $etape->grade }}</li>
            @endforeach
        </ul>

        <h3 class="section-heading">🎓 Diplômes universitaires</h3>
        <ul class="diploma-list">
            @foreach($enseignant->diplomes as $diplome)
                <li>
                    <strong>{{ $diplome->date }}</strong> — {{ $diplome->intitule }}  
                    <br><em>{{ $diplome->etablissement }}</em>
                </li>
            @endforeach
        </ul>

        <h3 class="section-heading">🔬 Affiliation</h3>
        <p class="ufr">{{ $enseignant->ufr }}</p>
    </div>
</section>
@endsection

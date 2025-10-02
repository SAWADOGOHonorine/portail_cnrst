@extends('layouts.app')

@section('titre', 'Accueil')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')
<div class="page-accueil">
    <div class="accueil-container">

        <!-- Bloc centre : publications récentes -->
        <div class="profil-centre">
            <h3 class="titre-section">Publications récentes</h3>

            @if($publications->count() > 0)
                <div class="publications-cards">
                    @foreach($publications as $publication)
                        <div class="card-publication">

                            <!-- Type de publication -->
                            <span class="publication-type">{{ class_basename($publication) }}</span>

                            @if(class_basename($publication) == 'Article')
                                <h2 class="publication-titre">{{ $publication->title ?? 'Sans titre' }}</h2>
                                <p><strong>Auteur :</strong> {{ $publication->author ?? 'Auteur inconnu' }}
                                    @if(!empty($publication->co_authors))
                                        , {{ $publication->co_authors }}
                                    @endif
                                </p>
                                <p><strong>Année :</strong> {{ $publication->publication_year ?? ($publication->created_at?->format('Y') ?? 'N/A') }}</p>
                                @if(!empty($publication->journal))
                                    <p><strong>Journal :</strong> {{ $publication->journal }}</p>
                                @endif
                                @if(!empty($publication->summary))
                                    <p><strong>Résumé :</strong> {{ $publication->summary }}</p>
                                @endif
                                <p><strong>Thématique :</strong> {{ $publication->thematique?->nom ?? 'Sans thématique' }}</p>

                            @elseif(class_basename($publication) == 'Fiche')
                                <h2 class="publication-titre">{{ $publication->record_type ?? 'Sans titre' }}</h2>
                                <p><strong>Auteur :</strong> {{ $publication->responsible ?? 'Auteur inconnu' }}</p>
                                <p><strong>Année :</strong> {{ $publication->creation_date ?? ($publication->created_at?->format('Y') ?? 'N/A') }}</p>
                                @if(!empty($publication->url))
                                    <p><strong>Source :</strong> <a href="{{ $publication->url }}" target="_blank">{{ $publication->url }}</a></p>
                                @endif
                                <p><strong>Résumé :</strong> {{ $publication->content ?? '' }}</p>
                                <p><strong>Thématique :</strong> {{ $publication->thematique?->nom ?? 'Sans thématique' }}</p>
                            @endif

                        </div>
                        <hr class="publication-separator">
                    @endforeach
                </div>
            @else
                <p>Aucune publication récente disponible.</p>
            @endif
        </div>

        <!-- Bloc droite : thématiques -->
        <div class="profil-droite">
            <h3 class="titre-section">📚 Thématiques</h3>

            @if($thematiques->count() > 0)
                <ul class="thematiques-list">
                    @foreach($thematiques as $thematique)
                        <li class="thematique-item">
                            {{ $thematique->nom ?? 'Sans nom' }}
                            <span class="count-badge">
                                ({{ ($thematique->articles?->count() ?? 0) + ($thematique->fiches?->count() ?? 0) }})
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Aucune thématique trouvée.</p>
            @endif
        </div>

    </div>
</div>
@endsection




































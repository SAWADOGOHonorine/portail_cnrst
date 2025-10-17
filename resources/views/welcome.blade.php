@extends('layouts.app')

@section('titre', 'Accueil')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')

<!-- ==================== Section Recherche ==================== -->
<section class="section-recherche py-5 text-center">
    <div class="container">
        <h2 class="mb-4 fw-bold text-uppercase text-white">Trouvez ce que vous cherchez</h2>

        <form action="{{ route('publications.search') }}" method="GET" class="form-recherche mx-auto">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="text" name="q" class="input-recherche" placeholder="Enseignant, Publication, Laboratoire ..." value="{{ request('q') }}">
                <button type="submit" class="btn-recherche">Rechercher</button>
            </div>
        </form>
    </div>
</section>

<!-- ==================== Contenu principal ==================== -->
<div class="page-accueil">
    <div class="accueil-container">

        <!-- Bloc centre : publications récentes -->
        <div class="profil-centre">
            <h3 class="titre-section">Publications récentes</h3>

            @if(isset($publications) && $publications->count() > 0)
                <div class="publications-cards">
                    @foreach($publications as $publication)
                        @php
                            $type = $publication->type;
                        @endphp

                        <div class="card-publication">
                            <!-- Type -->
                            <p class="type-publication text-uppercase fw-bold text-success">{{ $type }}</p>

                            <!-- ======== TITRE ========= -->
                            @if($type === 'Article')
                                <h2 class="publication-titre">
                                    <a href="{{ route('articles_detail', ['id' => $publication->id]) }}" class="lien-titre">
                                        {{ $publication->title }}
                                    </a>
                                </h2>
                            @elseif($type === 'Fiche')
                                <h2 class="publication-titre">
                                    <a href="{{ route('fiches_detail', ['id' => $publication->id]) }}" class="lien-titre">
                                        {{ $publication->titre }}
                                    </a>
                                </h2>
                            @endif

                            <!-- ======== AUTEUR(S) ========= -->
                            @if($type === 'Article')
                                <p><strong>Auteur :</strong> {{ $publication->author }}</p>
                                @if(!empty($publication->co_authors))
                                    <p><strong>Co-auteurs :</strong> {{ $publication->co_authors }}</p>
                                @endif
                            @elseif($type === 'Fiche')
                                <p><strong>Auteur :</strong> {{ $publication->auteurs ?? $publication->responsible }}</p>
                            @endif

                            <!-- ======== DISCIPLINE / THEMATIQUE ========= -->
                            @if($type === 'Fiche')
                                <p><strong>Discipline :</strong> {{ $publication->discipline }}</p>
                                <p><strong>Thématique :</strong> {{ $publication->thematique }}</p>
                            @endif

                            <!-- ======== RÉSUMÉ / DESCRIPTION ========= -->
                            @if($type === 'Article')
                                <p class="publication-resume">{{ $publication->summary }}</p>
                            @elseif($type === 'Fiche')
                                <p class="publication-resume">{{ $publication->resume ?? $publication->description }}</p>
                            @endif

                            <!-- ======== ANNÉE / DATE ========= -->
                            @if($type === 'Article')
                                <p><strong>Année :</strong> {{ \Carbon\Carbon::parse($publication->publication_date ?? $publication->created_at)->format('Y') }}</p>
                            @elseif($type === 'Fiche')
                                <p><strong>Année :</strong> {{ \Carbon\Carbon::parse($publication->creation_date ?? $publication->created_at)->format('Y') }}</p>
                            @endif
                        </div>

                        @if(!$loop->last)
                            <hr class="publication-separator">
                        @endif
                    @endforeach
                </div>
            @else
                <p>Aucune publication récente disponible.</p>
            @endif
        </div>

        <!-- Bloc droite : thématiques -->
        <div class="profil-droite">
            <h3 class="titre-section">Thématiques</h3>
            @if(isset($thematiques) && $thematiques->count() > 0)
                <ul class="thematiques-list">
                    @foreach($thematiques as $thematique)
                        <li class="thematique-item">
                            {{ $thematique->nom }}
                            <span class="count-badge">
                                ({{ ($thematique->articles?->count() ?? 0) + ($thematique->fiches?->count() ?? 0) }})
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Aucune thématique trouvée</p>
            @endif
        </div>
    </div>
</div>
@endsection




































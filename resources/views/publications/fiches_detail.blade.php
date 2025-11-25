@extends('layouts.app')

@section('title', 'Détail de la fiche')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/mon_espace/fiches_detail.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')
<section class="section-detail-fiche py-5">
    <div class="container"> 

        <!-- Titre de la page -->
        <div class="page-title mb-4 text-center">
            <h2 class="text-uppercase">
                <span class="strong">DÉTAILS</span> PUBLICATION
            </h2>
            <div class="underline mx-auto" style="width: 50px; height: 4px; background-color: #28a745; margin-top: 5px;"></div>
        </div> 

        <div class="detail-card card p-4">
            <div class="detail-header mb-3">
                <span class="label-type">{{ $fiche->type ?? 'Fiche Technique' }}</span>
                <h2 class="detail-title">{{ $fiche->titre }}</h2>
                <div class="detail-meta mt-2">
                    @if($fiche->annee)
                        <span class="detail-year"><i class="bi bi-calendar"></i> {{ $fiche->annee }}</span>
                    @endif
                    @if($fiche->source)
                        <span class="detail-source"><i class="bi bi-journal-text"></i> {{ $fiche->source }}</span>
                    @endif
                    @if($fiche->created_at)
                        <span class="detail-date"><i class="bi bi-clock"></i> {{ $fiche->created_at->format('d/m/Y') }}</span>
                    @endif
                </div>
            </div> 

            <div class="detail-body"> 

                <!-- Lien cliquable vers la fiche -->
                @if($fiche->url)
                <div class="detail-section mb-3">
                    <h5>Lien de la fiche :</h5>
                    <p><a href="{{ $fiche->url }}" target="_blank" class="text-primary">{{ $fiche->url }}</a></p>
                </div>
                @endif 

                <!-- Discipline -->
                @if($fiche->discipline)
                <div class="detail-section mb-3">
                    <h5>Discipline :</h5>
                    <p>{{ $fiche->discipline }}</p>
                </div>
                @endif 

                <!-- Auteur(s) -->
                @if($fiche->auteurs)
                <div class="detail-section mb-3">
                    <h5>Auteur(s) :</h5>
                    <p>{{ $fiche->auteurs }}</p>
                </div>
                @endif 

                <!-- Résumé -->
                @if($fiche->resume)
                <div class="detail-section mb-3">
                    <h5>Résumé :</h5>
                    <p>{{ $fiche->resume }}</p>
                </div>
                @endif 

                <!-- Description complète -->
                @if($fiche->description)
                <div class="detail-section mb-3">
                    <h5>Description complète :</h5>
                    <p>{{ $fiche->description }}</p>
                </div>
                @endif 

                <!-- Mots-clés -->
                @if($fiche->mots_cles)
                <div class="detail-section mb-3">
                    <h5>Mots-clés :</h5>
                    <div class="keywords">
                        @foreach(explode(',', $fiche->mots_cles) as $mot)
                            <span class="badge bg-success text-white me-1">{{ trim($mot) }}</span>
                        @endforeach
                    </div>
                </div>
                @endif 

                <!-- Document -->
<div class="detail-section mb-3">
    <h5>Document :</h5>

    @if($fiche->document)
        <p><strong>{{ $fiche->document }}</strong></p> <!-- Nom du document -->

        <a href="{{ route('fiche.document', $fiche->id) }}" 
           class="btn btn-success btn-document">
           <i class="bi bi-file-earmark-pdf"></i> Voir / Télécharger
        </a>

        <!-- Aperçu PDF si applicable -->
        @if(Str::endsWith($fiche->document, ['.pdf']))
        <iframe src="{{ asset('storage/' . $fiche->document) }}" 
                width="100%" height="500px" 
                class="document-preview mt-3"></iframe>
        @endif
    @endif
</div>


                <!-- Thématique -->
                @if($fiche->thematique)
                <div class="detail-section mb-3">
                    <h5>Thématique :</h5>
                    <p>{{ $fiche->thematique?->nom ?? 'Non renseignée' }}</p>
                </div>
                @endif
            </div> 

            <!-- Bouton retour -->
            <div class="detail-footer text-center mt-4">
                <a href="{{ route('publications.index') }}" class="btn-retour">Retour</a>
            </div>


        </div>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('title', 'Détail de l’article')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/mon_espace/fiches_detail.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')
<section class="section-detail-fiche py-5">
    <div class="container">
        {{-- Titre de la page --}}
        <div class="page-title mb-4">
            <h2 class="text-uppercase">
                <span class="strong">DÉTAILS</span> PUBLICATION
            </h2>
            <div class="underline" style="width: 50px; height: 4px; background-color: #28a745; margin-top: 5px;"></div>
        </div>
        <div class="detail-card">

            {{-- Header --}}
            <div class="detail-header">
                <span class="label-type">ARTICLE</span>
                <h2 class="detail-title">{{ $article->title ?? 'Sans titre' }}</h2>
                <div class="detail-meta">
                    @if(!empty($article->journal))
                        <span class="detail-source"><i class="bi bi-journal-text"></i> {{ $article->journal }}</span>
                    @endif
                    @if(!empty($article->publication_year))
                        <span class="detail-year"><i class="bi bi-calendar"></i> {{ $article->publication_year }}</span>
                    @elseif(!empty($article->publication_date))
                        <span class="detail-year"><i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($article->publication_date)->format('d/m/Y') }}</span>
                    @endif
                </div>
            </div>

            {{-- Body --}}
            <div class="detail-body">
                @if(!empty($article->url))
                    <div class="detail-section">
                        <h5>Lien de l’article :</h5>
                        <p><a href="{{ $article->url }}" target="_blank" class="text-primary">{{ $article->url }}</a></p>
                    </div>
                @endif

                @if(!empty($article->author))
                    <div class="detail-section">
                        <h5>Auteur principal :</h5>
                        <p>{{ $article->author }}</p>
                    </div>
                @endif

                @if(!empty($article->co_authors))
                    <div class="detail-section">
                        <h5>Co-auteur(s) :</h5>
                        <p>{{ $article->co_authors }}</p>
                    </div>
                @endif

                @if(!empty($article->summary))
                    <div class="detail-section">
                        <h5>Résumé :</h5>
                        <p>{{ $article->summary }}</p>
                    </div>
                @endif

                @if(!empty($article->status))
                    <div class="detail-section">
                        <h5>Statut :</h5>
                        <p>{{ ucfirst($article->status) }}</p>
                    </div>
                @endif
            </div>

            {{-- Footer --}}
            <div class="detail-footer text-center mt-4">
                <a href="{{ route('publications.index') }}" class="btn-retour">Retour</a>
            </div>
        </div>
    </div>
</section>
@endsection

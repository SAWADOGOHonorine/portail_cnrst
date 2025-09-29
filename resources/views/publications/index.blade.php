@extends('layouts.app')

@section('title', 'Publications')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/publication/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')
<!-- la premiere section -->
 <section class="enseignants-section" aria-labelledby="enseignants-title">
  <div class="container">
    <div class="page-title">
      <h1><span class="strong">PUBLICAIONS</h1>
      <div class="underline"></div>
    </div>

    <div class="status-bar">
      <button type="button" class="status-button">En activité <span class="caret">▾</span></button>
    </div>

    <div class="filters">
      <form method="GET" action="{{ route('chercheurs') }}">
        <input type="text" name="q" class="filter-input" placeholder="Tapez ce que vous voulez ...">
        <select name="ufr" class="filter-select">
          <option value="">Toutes les types</option>
          <option value=""> Articles</option>
          <option value=""> Fiches Techniques</option>
          <option value=""> Autres</option>
        </select>
        <select name="discipline" class="filter-select">
          <option value="">Toutes les disciplines</option>
          <option value="">Toutes les disciplines</option>
          <option value="">Toutes les disciplines</option>
          <option value="">Toutes les disciplines</option>
          <option value="">Toutes les disciplines</option>
        </select>
        <select name="labo" class="filter-select">
          <option value="">Tous les laboratoires</option>
        </select>
        <button type="submit" class="submit-button">Rechercher</button>
      </form>
    </div>
<div class="container my-4">
    <h2 class="mb-4"> Publications <span class="badge bg-secondary">{{ $publications->total() }}</span></h2>

    @if($publications->count() > 0)
        @foreach($publications as $pub)
            <div class="pub-item mb-4 pb-3 border-bottom">
                <h5 class="type-title text-uppercase text-success">ARTICLE</h5>

                <h4 class="pub-title">
                    @if($pub->url)
                        <a href="{{ $pub->url }}" target="_blank" class="text-decoration-none text-dark">
                            {{ $pub->title }}
                        </a>
                    @else
                        {{ $pub->title }}
                    @endif
                </h4>

                <div class="pub-authors"><strong>Auteur :</strong> {{ $pub->author }}</div>

                @if($pub->co_authors)
                    <div class="pub-coauthors"><strong>Co-auteurs :</strong> {{ $pub->co_authors }}</div>
                @endif

                <div class="pub-journal">
                    @if($pub->journal)
                        <strong>Journal :</strong> {{ $pub->journal }}
                    @endif
                    @if($pub->publication_year)
                        <span class="ms-2"><strong>Année :</strong> {{ $pub->publication_year }}</span>
                    @endif
                </div>

                @if($pub->summary)
                    <p class="pub-summary mt-2">{{ $pub->summary }}</p>
                @endif

                @if($pub->url)
                    <a href="{{ $pub->url }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                        🔗 Consulter l’article
                    </a>
                @endif
            </div>
        @endforeach

        <div class="mt-4 d-flex justify-content-center">
            {{ $publications->links() }}
        </div>
    @else
        <p class="text-muted">Aucune publication disponible pour le moment.</p>
    @endif
</div>
@endsection




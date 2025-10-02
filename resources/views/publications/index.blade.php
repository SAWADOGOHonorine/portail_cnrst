@extends('layouts.app')

@section('title', 'Publications')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/publication.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')

<!-- ================== SECTION RECHERCHE ================== -->
<section class="search-section py-4 bg-light" aria-labelledby="search-title">
    <div class="container">

        <div class="page-title text-center mb-3">
            <h1 id="search-title"><span class="strong">PUBLICATIONS</span></h1>
            <div class="underline mx-auto"></div>
        </div>

        <!-- Filtres -->
        <div class="filters">
            <form method="GET" action="{{ route('publications.index') }}" class="d-flex flex-wrap justify-content-center gap-2">
                <input type="text" name="q" class="filter-input"
                       placeholder="Tapez ce que vous voulez ..."
                       value="{{ request('q') }}">
                <select name="type" class="filter-select">
                    <option value="">Tous les types</option>
                    <option value="article" {{ request('type') == 'article' ? 'selected' : '' }}>Articles</option>
                    <option value="fiche" {{ request('type') == 'fiche' ? 'selected' : '' }}>Fiches Techniques</option>
                </select>
                <button type="submit" class="submit-button">Rechercher</button>
            </form>
        </div>

    </div>
</section>

<!-- ================== SECTION PUBLICATIONS ================== -->
<section class="publications-section py-5">
    <div class="container">

        <h2 class="mb-4">
            Publications <span class="badge bg-secondary">{{ $totalCount }}</span>
        </h2>

        @if($combined->count() > 0)
            @foreach($combined as $item)
                <div class="pub-item mb-4 pb-3 border-bottom">
                    @if($item['type'] === 'article')
                        <h5 class="type-title text-uppercase text-success">ARTICLE</h5>
                        <h4 class="pub-title">
                            @if($item['data']['url'])
                                <a href="{{ $item['data']['url'] }}" target="_blank" class="text-decoration-none text-dark">
                                    {{ $item['data']['titre'] }}
                                </a>
                            @else
                                {{ $item['data']['titre'] }}
                            @endif
                        </h4>
                        <div class="pub-authors"><strong>Auteur :</strong> {{ $item['data']['auteurs'] }}</div>
                        @if(!empty($item['data']['co_auteurs']))
                            <div class="pub-coauthors"><strong>Co-auteurs :</strong> {{ $item['data']['co_auteurs'] }}</div>
                        @endif
                        <div class="pub-journal">
                            @if(!empty($item['data']['journal']))
                                <strong>Journal :</strong> {{ $item['data']['journal'] }}
                            @endif
                            @if(!empty($item['data']['annee']))
                                <span class="ms-2"><strong>Année :</strong> {{ $item['data']['annee'] }}</span>
                            @endif
                        </div>
                        @if(!empty($item['data']['summary']))
                            <p class="pub-summary mt-2">{{ $item['data']['summary'] }}</p>
                        @endif
                        @if(!empty($item['data']['url']))
                            <a href="{{ $item['data']['url'] }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                🔗 Consulter l’article
                            </a>
                        @endif

                    @elseif($item['type'] === 'fiche')
                        <h5 class="type-title text-uppercase text-primary">FICHE TECHNIQUE</h5>
                        <h4 class="pub-title">{{ $item['data']['titre'] }}</h4>
                        <p class="pub-summary mt-2">{{ $item['data']['description'] }}</p>
                        @isset($item['data']['prix'])
                            <p><strong>Prix :</strong> {{ $item['data']['prix'] }} FCFA</p>
                        @endisset
                    @endif

                    <small class="text-muted">Publié le {{ \Carbon\Carbon::parse($item['data']['created_at'])->format('d/m/Y') }}</small>
                </div>
            @endforeach

            <!-- Pagination Laravel -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $combined->links() }}
            </div>
        @else
            <p class="text-muted">Aucune publication disponible pour le moment.</p>
        @endif

    </div>
</section>

@endsection




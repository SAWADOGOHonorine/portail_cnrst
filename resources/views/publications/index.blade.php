@extends('layouts.app')

@section('title', 'Publications')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/publication.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')

<section class="enseignants-section" aria-labelledby="enseignants-title">
  <div class="container">
    <div class="page-title">
      <h1><span class="strong">PUBLICATIONS</span></h1>
      <div class="underline"></div>
    </div>

    {{-- Formulaire de recherche --}}
    <div class="filters">
      <form method="GET" action="{{ route('publications.index') }}">
        <input type="text" name="q" class="filter-input" placeholder="Tapez ce que vous voulez ..." value="{{ request('q') }}">
        <select name="discipline" class="filter-select">
          <option value="">Tous les types</option>
          <option value="article" {{ request('discipline') === 'article' ? 'selected' : '' }}>Articles</option>
          <option value="fiche" {{ request('discipline') === 'fiche' ? 'selected' : '' }}>Fiches Techniques</option>
        </select>
        <button type="submit" class="submit-button">Rechercher</button>
      </form>
    </div>

    <div class="page-publications-container d-flex flex-wrap">

      {{-- Colonne gauche : publications --}}
      <div class="colonne-publications flex-grow-1 me-4">
        <h2 class="section-title">Publications <span class="badge bg-secondary">{{ $combined->total() }}</span></h2>

        @foreach($combined as $item)
          @php $data = $item['data']; @endphp

          <div class="publication-item mb-4 p-3 shadow-sm d-flex flex-column">
            {{-- Type de publication --}}
            <h5 class="type-title text-uppercase {{ $item['type'] === 'article' ? 'text-success' : 'text-primary' }}">
              {{ strtoupper($item['type']) }}
            </h5>

            {{-- Titre cliquable --}}
            <h4 class="pub-title">
              @if($item['type'] === 'article')
                <a href="{{ route('articles_detail', $data->id) }}" class="link-article">
                  {{ $data->title ?? 'Sans titre' }}
                </a>
              @elseif($item['type'] === 'fiche')
                <a href="{{ route('fiches_detail', $data->id) }}" class="link-fiche">
                  {{ $data->titre ?? 'Sans titre' }}
                </a>
              @endif
            </h4>

            {{-- Détails selon le type --}}
            @if($item['type'] === 'article')
              @if(!empty($data->auteurs)) <p><strong>Auteurs :</strong> {{ Str::limit($data->auteurs, 50) }}</p> @endif
              @if(!empty($data->co_auteurs)) <p><strong>Co-auteurs :</strong> {{ Str::limit($data->co_auteurs, 50) }}</p> @endif
              @if(!empty($data->journal)) 
                <p><strong>Journal :</strong> {{ $data->journal }} @if(!empty($data->annee)) ({{ $data->annee }}) @endif</p>
              @endif
              @if(!empty($data->summary)) <p>{{ Str::limit($data->summary, 150) }}</p> @endif
            @elseif($item['type'] === 'fiche')

                {{-- Titre --}}
                @if(!empty($data->titre))
                    <p><strong>Titre :</strong> {{ Str::limit($data->titre, 150) }}</p>
                @endif

                {{-- Auteur --}}
                @if(!empty($data->auteur))
                    <p><strong>Auteur :</strong> {{ Str::limit($data->auteur, 100) }}</p>
                @endif

                {{-- Année de publication --}}
                @if(!empty($data->annee))
                    <p><strong>Année de publication :</strong> {{ $data->annee }}</p>
                @endif
                @if(!empty($data->resume))
                    <p><strong>Résumé :</strong> {{ Str::limit($data->resume, 200) }}</p>
                @endif

                {{-- Discipline --}}
                @if(!empty($data->discipline))
                    <p><strong>Discipline :</strong> {{ $data->discipline }}</p>
                @endif

                <!-- {{-- Bouton Lire plus (rouge comme demandé) --}}
                <a href="{{ url('/fiche/' . $data->id) }}" 
                  class="btn btn-danger mt-2"
                  style="padding: 6px 14px; font-size: 14px; border-radius: 6px; font-weight: bold;">
                    Lire plus
                </a> -->

            @endif


            <div class="d-flex justify-content-between align-items-center mt-2">
              {{-- Date de création --}}
              <small class="text-muted">{{ optional($data->created_at)->format('d/m/Y') }}</small><br><br>

              <!-- button voir plus -->
             <div class="d-flex justify-content-between align-items-center mt-2">
                  <!-- <small class="text-muted">{{ optional($data->created_at)->format('d/m/Y') }}</small> -->

                  <a href="{{ $item['type'] === 'article' ? route('articles_detail', $data->id) : route('fiches_detail', $data->id) }}" 
                    class="btn btn-lireplus btn-sm">
                    Lire plus
                  </a>
              </div>

            </div>
          </div>
        @endforeach
      </div>

      {{-- Colonne droite : thématiques --}}
      <div class="colonne-thematiques flex-shrink-0" style="width: 250px;">
        <h3 class="titre-section">Thématiques</h3>
        @if($thematiques->count() > 0)
          <ul class="thematiques-list list-group">
            @foreach($thematiques as $thematique)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $thematique->nom ?? 'Sans nom' }}
                <span class="badge bg-secondary rounded-pill">
                  {{ $thematique->publications_count ?? 0 }}
                </span>
              </li>
            @endforeach
          </ul>
        @else
          <p>Aucune thématique trouvée.</p>
        @endif
      </div>

    </div> {{-- fin page-publications-container --}}

    {{-- Pagination en bas de page, centrée --}}
    <div class="pagination-wrapper mt-4 mb-4 d-flex justify-content-center">
      {{ $combined->links() }}
    </div>

  </div>
</section>

@endsection



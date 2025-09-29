@extends('layouts.app')

@section('title', 'Les laboratoires')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/laboratoire.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')
<section class="enseignants-section" aria-labelledby="enseignants-title">
  <div class="container">
    <div class="page-title">
      <h1><span class="strong">LABORATOIRES</span></h1>
      <div class="underline"></div>
    </div>

    <div class="status-bar">
      <button type="button" class="status-button">En activité <span class="caret">▾</span></button>
    </div>

    <!-- FILTRES -->
    <div class="filters mb-4">
      <form method="GET" action="{{ route('laboratoires.index') }}" class="d-flex gap-2 flex-wrap">
        <input type="text" name="q" class="filter-input form-control" placeholder="Tapez ce que vous voulez ..." value="{{ request('q') }}">
        
        <select name="ufr" class="filter-select form-control">
          <option value="">Toutes les UFR/Établissements</option>
          <option value="IFoad" {{ request('ufr')=='IFoad' ? 'selected' : '' }}>UFR/IFOAD</option>
          <option value="SH" {{ request('ufr')=='SH' ? 'selected' : '' }}>UFR/SH</option>
          <option value="SEA" {{ request('ufr')=='SEA' ? 'selected' : '' }}>UFR/SEA</option>
          <option value="SDS" {{ request('ufr')=='SDS' ? 'selected' : '' }}>UFR/SDS</option>
        </select>

        <select name="discipline" class="filter-select form-control">
          <option value="">Toutes les disciplines</option>
          <option value="Math" {{ request('discipline')=='Math' ? 'selected' : '' }}>Mathématiques</option>
          <option value="Physique" {{ request('discipline')=='Physique' ? 'selected' : '' }}>Physique</option>
          <option value="Informatique" {{ request('discipline')=='Informatique' ? 'selected' : '' }}>Informatique</option>
          <option value="Chimie" {{ request('discipline')=='Chimie' ? 'selected' : '' }}>Chimie</option>
        </select>

        <button type="submit" class="submit-button btn btn-primary">Rechercher</button>
      </form>
    </div>

    <!-- LISTE DES LABORATOIRES -->
    <div class="row">
      @forelse($laboratoires as $lab)
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            @if($lab->logo)
              <img src="{{ asset('storage/'.$lab->logo) }}" class="card-img-top" alt="{{ $lab->nom }}">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $lab->nom }}</h5>
              <p><strong>Sigle :</strong> {{ $lab->sigle }}</p>
              <p><strong>Discipline :</strong> {{ $lab->discipline }}</p>
              <p><strong>Établissement :</strong> {{ $lab->etablissement }}</p>
              <a href="{{ route('laboratoires.show', $lab->id) }}" class="btn btn-sm btn-primary">Voir plus</a>
            </div>
          </div>
        </div>
      @empty
        <p class="text-center text-muted">Aucun laboratoire trouvé.</p>
      @endforelse
    </div>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-center mt-4">
      {{ $laboratoires->withQueryString()->links() }}
    </div>
  </div>
</section>
@endsection

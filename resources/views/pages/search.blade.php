<!-- @extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/search.css') }}">
@endpush

@section('content')
  <section class="search-results">
    <h2>Résultats pour : "{{ $query }}"</h2>

    @if($results->count())
      <ul class="result-list">
        @foreach($results as $result)
          <li>
            <h4>{{ $result->titre }}</h4>
            <p>{{ Str::limit($result->contenu, 150) }}</p>
            <a href="#">Lire plus</a>
          </li>
        @endforeach
      </ul>
    @else
      <p>Aucun résultat trouvé.</p>
    @endif
  </section>
@endsection -->





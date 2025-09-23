@extends('layouts.frontend')

@section('title', 'Publications')

@section('content')
    <h2>📚 Liste des publications</h2>

    @foreach($publications as $publication)
        <div class="publication-card">
            <h3>{{ $publication->titre }}</h3>
            <p><strong>Auteurs :</strong> {{ $publication->auteurs }}</p>
            <p><strong>Année :</strong> {{ $publication->annee }}</p>
            <p><strong>Thème :</strong> {{ $publication->theme }}</p>
            <p>{{ $publication->resume }}</p>
            @if($publication->fichier)
                <a href="{{ Storage::url($publication->fichier) }}" target="_blank">📄 Télécharger</a>
            @endif
        </div>
    @endforeach

    {{ $publications->links() }}
@endsection


@extends('layouts.app')

@section('titre', 'Résultats de recherche')

@section('content')
<div class="page-accueil">
    <div class="accueil-container">
        <h3>Résultats pour : "{{ $query }}"</h3>

        @if($publications->isEmpty())
            <p>Aucune publication trouvée.</p>
        @else
            <div class="publications-cards">
                @foreach($publications as $publication)
                    <div class="card-publication">
                        <p class="publication-type">{{ class_basename($publication) }}</p>
                        <h2 class="publication-titre">{{ $publication->title ?? $publication->record_type ?? 'Sans titre' }}</h2>
                        <p><strong>Auteur :</strong> {{ $publication->author ?? $publication->responsible ?? 'Auteur inconnu' }}
                            @if(!empty($publication->co_authors))
                                , {{ $publication->co_authors }}
                            @endif
                        </p>
                        <p class="publication-resume">{{ $publication->summary ?? $publication->content ?? 'Pas de résumé disponible.' }}</p>
                        <p><strong>Année :</strong> {{ $publication->publication_year ?? ($publication->creation_date ?? $publication->created_at?->format('Y')) }}</p>
                        <a href="{{ route(class_basename($publication) == 'Article' ? 'articles.show' : 'fiches.show', $publication->id) }}" class="btn-read-more">Lire plus</a>
                        <hr class="separator">
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Fiches techniques')

@section('content')
<div class="container mt-4">
    <h2>Fiches techniques publiées</h2>

    @if($fiches->count() > 0)
        @foreach($fiches as $fiche)
            <div class="fiche-card p-3 mb-3 border rounded shadow-sm">
                <h5>{{ $fiche->record_type }}</h5>
                <p>{{ $fiche->content }}</p>
                <p><strong>Responsable :</strong> {{ $fiche->responsible ?? 'N/A' }}</p>
                <p><strong>Date :</strong> {{ $fiche->creation_date ?? 'Non renseignée' }}</p>

                {{-- Lien externe si disponible --}}
                @if($fiche->url)
                    <a href="{{ $fiche->url }}" target="_blank" class="btn btn-outline-secondary btn-sm">🔗 Lien externe</a>
                @endif

                {{-- Fichier téléchargeable si disponible --}}
                @if($fiche->fichier)
                    <a href="{{ asset('storage/' . $fiche->fichier) }}" class="btn btn-outline-primary btn-sm" download>📎 Télécharger le fichier</a>
                @endif
            </div>
        @endforeach
    @else
        <p class="text-muted">⚠️ Aucune fiche technique disponible pour le moment.</p>
    @endif
</div>
@endsection

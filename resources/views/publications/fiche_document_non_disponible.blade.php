


@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/fiche_document.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('title', 'Document non disponible')

@section('content')
<div class="container document-unavailable-container">
    <h2><i class="bi bi-x-circle"></i> Document non disponible</h2>
    <p>Le document demandé n'existe pas ou a été supprimé.</p>
    <a href="{{ route('publications.index') }}" class="btn btn-success mt-3">
        <i class="bi bi-arrow-left-circle"></i> Retour 
    </a>
</div>
@endsection


@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/fiche_document.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@extends('layouts.app')

@section('title', 'Document de la fiche')

@section('content')
<div class="container py-5">
    <h2>Document : {{ $fiche->titre }}</h2>
    <iframe src="{{ asset('storage/' . $fiche->document) }}" width="100%" height="600px" style="border:1px solid #ccc; border-radius:10px;"></iframe>
</div>
@endsection

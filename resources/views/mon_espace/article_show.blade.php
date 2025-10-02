@extends('layouts.app')

@section('title', $article->title)

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/mon_espace/article_show.css') }}">
@endpush

@section('content')
<div class="container mt-5">
    <div class="article-detail p-4 border rounded shadow-sm bg-white">
        <h2 class="mb-3">{{ $article->title }}</h2>

        <p class="text-muted mb-2">
            <strong>Auteur :</strong> {{ $article->author }}
            @if($article->co_authors)
                | <strong>Co-auteurs :</strong> {{ $article->co_authors }}
            @endif
        </p>

        <p class="mb-2"><strong>Journal :</strong> {{ $article->journal ?? 'N/A' }}</p>
        <p class="mb-2"><strong>Date de publication :</strong> {{ $article->publication_date ?? $article->publication_year ?? 'N/A' }}</p>

        @if($article->summary)
            <div class="my-3">
                <h5>Résumé</h5>
                <p>{{ $article->summary }}</p>
            </div>
        @endif

        <div class="my-3 d-flex flex-wrap gap-2">
            @if($article->url)
                <a href="{{ $article->url }}" target="_blank" class="btn btn-outline-primary">
                    🔗 Voir l'article
                </a>
            @endif

            @if($article->fichier)
                <a href="{{ route('articles.download', $article->id) }}" class="btn btn-outline-secondary">
                    📄 Télécharger le fichier
                </a>
            @endif
        </div>

        <p class="mt-3"><strong>Status :</strong> 
            <spa

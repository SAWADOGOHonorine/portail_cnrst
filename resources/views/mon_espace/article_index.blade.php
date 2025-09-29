<!-- @extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/mon_espace/article_index.css') }}">

<div class="container">

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>📚 Mes articles</h2>

    <a href="{{ route('articles.create') }}" class="btn-success">➕ Ajouter un article</a>

    @forelse($articles as $article)
        <div class="article-card">
            <h4>{{ $article->title }}</h4>
            <p><strong>Auteur :</strong> {{ $article->author }}</p>
            <p><strong>Co-auteurs :</strong> {{ $article->co_authors }}</p>
            <p><strong>Journal :</strong> {{ $article->journal }}</p>
            <p><strong>Année :</strong> {{ $article->publication_year }}</p>
            <p><strong>Status :</strong> {{ ucfirst($article->status) }}</p>

            <div class="actions">
                <a href="{{ route('articles.edit', $article->id) }}" class="btn-outline-secondary">✏️ Modifier</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-outline-secondary">🗑 Supprimer</button>
                </form>
            </div>
        </div>
    @empty
        <p>Aucun article enregistré pour le moment.</p>
    @endforelse

</div>

@endsection -->

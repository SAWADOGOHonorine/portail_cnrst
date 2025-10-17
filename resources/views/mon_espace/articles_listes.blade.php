<link rel="stylesheet" href="{{ asset('css/mon_espace/articles_listes.css') }}">

<div class="container mt-4">

    {{-- TITRE + BOUTON AJOUT --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Mes articles</h2>
        <div class="text-center mb-4">
        <a href="{{ route('articles.create') }}" class="btn btn-outline-primary add-article-btn">
            ➕ Ajouter un article
        </a>
    </div>

    </div>

    {{-- ALERTE SUCCÈS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- LISTE DES ARTICLES --}}
    @if($articles->count() > 0)
        <div class="articles-wrapper">
            @foreach($articles as $article)
                <div class="article-card">
                    <h5>{{ $article->title }} 
                        <small class="text-muted">({{ $article->publication_year ?? 'N/A' }})</small>
                    </h5>
                    <p><strong>Auteur :</strong> {{ $article->author }}</p>
                    @if($article->co_authors)
                        <p><strong>Co-auteurs :</strong> {{ $article->co_authors }}</p>
                    @endif
                    @if($article->journal)
                        <p><strong>Journal :</strong> {{ $article->journal }}</p>
                    @endif
                    @if($article->summary)
                        <p><strong>Résumé :</strong> {{ Str::limit($article->summary, 80) }}</p>
                    @endif
                    <p><strong>Status :</strong> 
                        <span class="badge bg-{{ $article->status === 'published' ? 'success' : ($article->status === 'accepted' ? 'primary' : 'warning') }}">
                            {{ ucfirst($article->status) }}
                        </span>
                    </p><br>

                    {{-- Boutons Voir et Télécharger --}}
                    <!-- <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-primary btn-sm mt-auto mb-2">🔗 Voir l'article</a> -->

                    @if($article->fichier)
                        <a href="{{ route('articles.download', $article->id) }}" class="btn btn-outline-secondary btn-sm mb-2">Télécharger le fichier</a>
                    @endif

                    {{-- Actions modifier / supprimer --}}
                    <div class="d-flex gap-2 flex-wrap mt-auto">
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-success btn-sm flex-grow-1">✏️ Modifier</a><br><br>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="flex-grow-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Confirmer la suppression ?')">🗑 Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links() }}
        </div>
    @else
        <p class="text-muted">Aucun article trouvé.</p>
    @endif

</div>

<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }
    }, 4000);
</script>


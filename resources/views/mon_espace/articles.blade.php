
   

<div class="container mt-4">
    <h2 class="mb-4"> Mes articles</h2>
<link rel="stylesheet" href="{{ asset('css/mon_espace/article_index.css') }}">
    {{-- Alert success --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulaire d'ajout --}}
    <form method="POST" action="{{ route('articles.store') }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" name="title" placeholder="Titre de l'article" required class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="journal" placeholder="Journal" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="number" name="publication_year" placeholder="Année de publication" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="date" name="publication_date" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="url" name="url" placeholder="Lien URL" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="author" placeholder="Auteur principal" class="form-control">
            </div>
            <div class="col-md-6">
                <input type="text" name="co_authors" placeholder="Co-auteurs" class="form-control">
            </div>
            <div class="col-12">
                <textarea name="summary" placeholder="Résumé" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-12">
                <select name="status" class="form-control">
                    <option value="submitted">Soumis</option>
                    <option value="accepted">Accepté</option>
                    <option value="published">Publié</option>
                </select>
            </div>
            <div class="col-12">
                <input type="file" name="fichier" class="form-control mt-2">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success mt-2">📥 Enregistrer</button>
            </div>
        </div>
    </form>

    {{-- Liste des articles --}}
    @if($articles->count() > 0)
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="article-card p-3 border rounded shadow-sm h-100 d-flex flex-column">
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
                            <p><strong>Résumé :</strong> {{ $article->summary }}</p>
                        @endif
                        <p><strong>Status :</strong> 
                            <span class="badge bg-{{ $article->status === 'published' ? 'success' : ($article->status === 'accepted' ? 'primary' : 'warning') }}">
                                {{ ucfirst($article->status) }}
                            </span>
                        </p>

                        @if($article->url)
                            <a href="{{ $article->url }}" target="_blank" class="btn btn-outline-primary btn-sm mt-auto">
                                🔗 Voir l'article
                            </a>
                        @endif
                        @if($article->fichier)
                            <a href="{{ route('articles.download', $article->id) }}" class="btn btn-outline-secondary btn-sm mt-2">
                                📄 Télécharger le fichier
                            </a>
                        @endif

                        <div class="mt-2 d-flex gap-2">
                            {{-- Modifier --}}
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-success btn-sm flex-grow-1">
                                ✏️ Modifier
                            </a>

                            {{-- Supprimer --}}
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Confirmer la suppression ?')">
                                    🗑 Supprimer
                                </button>
                            </form>
                        </div>
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

{{-- Script alert auto-disparition --}}
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







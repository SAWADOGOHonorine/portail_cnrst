@push('styles')
<link rel="stylesheet" href="{{ asset('css/publications.css') }}">
@endpush

@php
// Liste des thématiques statiques
$listeThematiques = [
    'Mathématiques', 
    'Informatique et sciences de l\'information',
    'Sciences physiques',
    'Sciences de la Terre',
    'Sciences sanitaires',
    'Sciences biologiques',
    'Génie civil',
    'Génie électrique, électroniques',
    'Médecine fondamentale',
    'Médecine clinique',
    'Agriculture, sylviculture et pêche',
    'Sciences vétérinaires',
    'Psychologie',
    'Économie',
    'Sciences de l\'éducation',
    'Sociologie',
    'Sciences politiques',
    'Droit & Sciences politiques',
    'Géographie',
    'Médias et Communication',
    'Histoire & Archéologie',
    'Langues et littératures',
    'Arts',
    'Autres'
];
@endphp

<div class="container mt-4">
    <div class="row">
        {{-- Colonne gauche : publications --}}
        <div class="col-md-8">
            <h2 class="mb-4">
                {{ request('thematique') ?? 'Toutes les publications' }}
            </h2>

            @if($articles->count() > 0)
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-12 mb-3">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <h5>{{ $article->title }}</h5>
                                    <p class="text-muted">{{ $article->publication_year ?? 'N/A' }}</p>
                                    <p><strong>Auteur :</strong> {{ $article->author }}</p>
                                    <p><strong>Thématique :</strong> {{ $article->thematique ?? 'Non défini' }}</p>
                                    @if($article->summary)
                                        <p>{{ Str::limit($article->summary, 120) }}</p>
                                    @endif
                                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-primary btn-sm mt-auto">
                                        🔗 Voir l'article
                                    </a>
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
                <p class="text-muted">Aucune publication trouvée.</p>
            @endif
        </div>

        {{-- Colonne droite : thématiques cliquables --}}
        <div class="col-md-4">
            <h5>Thématiques</h5>
            <div class="d-flex flex-column gap-2">
                <a href="{{ route('publications.index') }}" class="btn btn-outline-secondary {{ request('thematique') ? '' : 'active' }}">
                    Toutes
                </a>
                @foreach($listeThematiques as $thematique)
                    <a href="{{ route('publications.index', ['thematique' => $thematique]) }}"
                       class="btn btn-outline-secondary {{ request('thematique') == $thematique ? 'active' : '' }}">
                        {{ $thematique }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('title', 'CVs Uploadés')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center text-success">Liste des CV</h2>

    @if($cvs->isEmpty())
        <div class="alert alert-info">Aucun CV n’a encore été soumis.</div>
    @else
        <div class="table-wrapper">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th class="d-none d-md-table-cell">WhatsApp</th>
                        <th class="d-none d-md-table-cell">Spécialité</th>
                        <th class="d-none d-md-table-cell">Domaine</th>
                        <th class="d-none d-md-table-cell">Mot-clé</th>
                        <th class="d-none d-md-table-cell">Date de Naissance</th>
                        <th class="d-none d-md-table-cell">Lieu de Naissance</th>
                        <th class="d-none d-md-table-cell">Détail scientifique</th>
                        <th class="d-none d-md-table-cell">Projet de recherche</th>
                        <th class="d-none d-md-table-cell">Genre</th>
                        <th class="d-none d-md-table-cell">Thématique recherche</th>
                        <th class="d-none d-md-table-cell">Adresse</th>
                        <th class="d-none d-md-table-cell">Ville</th>
                        <th class="d-none d-md-table-cell">Téléphone</th>
                        <th>Département</th>
                        <th>Institut</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    @foreach($cvs as $cv)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cv->nom }}</td>
                            <td>{{ $cv->prenom }}</td>
                            <td class="text-truncate">{{ $cv->email }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->whatsapp ?? 'Non renseigné' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->specialite ?? 'Non renseignée' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->domaine ?? 'Non renseigné' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->mot_cle ?? 'Aucun' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->date_naissance ?? 'Non renseignée' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->lieu_naissance ?? 'Non renseigné' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->detaille_scientifique ?? '-' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->projet_recherche ?? '-' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->genre ? ucfirst($cv->genre) : '-' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->thematique_recherche ?? '-' }}</td>
                            <td class="d-none d-md-table-cell text-truncate">{{ $cv->adresse ?? 'Non renseignée' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->ville ?? 'Non renseignée' }}</td>
                            <td class="d-none d-md-table-cell">{{ $cv->telephone ?? 'Non fourni' }}</td>
                            <td>{{ $cv->departement ?? 'Non renseigné' }}</td>
                            <td>{{ $cv->institut ?? 'Non renseigné' }}</td>

                            <td class="actions-cell">
                                <a href="{{ route('cv.show', $cv->id) }}" class="btn btn-info btn-sm" target="_blank">
                                    Voir CV
                                </a>
                                <a href="{{ route('cv.downloadPdf', $cv->id) }}" class="btn btn-primary btn-sm mb-1">
                                    Télécharger
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection


@push('styles')
<style>

/*************** FIX RESPONSIVE TABLE *****************/

.table-wrapper {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin-bottom: 1rem;
}

.table-wrapper table {
    min-width: 1200px; /* Pour voir toutes les colonnes */
}

/* Empêcher les cellules de se casser */
.table th, .table td {
    white-space: nowrap;
}

/* Raccourcir les textes trop longs */
.text-truncate {
    max-width: 180px;
    overflow: hidden;
    text-overflow: ellipsis;
    display: block;
}


/* Boutons */
.btn-sm {
    padding: 0.35rem 0.7rem;
    font-size: 0.85rem;
    white-space: nowrap;
}

</style>
@endpush

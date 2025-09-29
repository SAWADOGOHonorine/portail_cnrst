@extends('layouts.app')

@section('title', 'Nos équipements')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/equipement.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')

<!-- 🔍 SECTION 1 : Recherche -->
<section class="section-recherche py-4">
    <div class="container">
        <h2 class="section-title"> Recherche d’équipements</h2>
        <form method="get" action="#">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="q" class="form-control" placeholder="Tapez ce que vous voulez ...">
                </div>
                <div class="col-md-4">
                    <select class="form-select" name="organization">
                        <option value="">Tous les laboratoires</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" name="etat">
                        <option value="">Tous les états</option>
                        <option value="fonctionnel">Fonctionnel</option>
                        <option value="défectueux">Défectueux</option>
                        <option value="maintenance">En maintenance</option>
                    </select>
                </div>
            </div>
            <div class="text-end mt-3">
                <button class="btn btn-primary" type="submit">Rechercher</button>
            </div>
        </form>
    </div>
</section>

<!-- 🧪 SECTION 2 : Résultats -->
<section class="section-resultats py-5 bg-light">
    <div class="container">
        <h2 class="section-title"> Équipements trouvés</h2>
        <div class="row">
            @foreach($equipements as $eq)
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ $eq->url }}">
                    <div class="card grid-result-item h-100">
                        <h4 class="ms-2 mt-2">{{ $eq->nom }}</h4>
                        <p class="ms-2 mt-1">
                            <strong>
                                <span class="label label-danger"><b><em>{{ $eq->etat }}</em></b></span>
                            </strong>
                            <span class="text-dark ms-2">Arrivé le : <b>{{ $eq->date_arrivee }}</b></span>
                        </p>
                        <ul class="relations ms-2 text-dark">
                            <li>Laboratoire : <b>{{ $eq->laboratoire }}</b></li>
                        </ul>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!--  SECTION : Pagination stylisée -->
<section class="section-pagination py-4">
    <div class="container">
        <div class="row clearfix">
            <div class="text-center">
                <ul class="pagination justify-content-center m-0">
                    <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Précedent">
                        <span class="page-link">«</span>
                    </li>

                    <li class="page-item active" aria-current="page">
                        <span class="page-link">1</span>
                    </li>

                    @for($i = 2; $i <= 10; $i++)
                        <li class="page-item">
                            <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <li class="page-item disabled"><span class="page-link">...</span></li>

                    <li class="page-item"><a class="page-link" href="?page=13">13</a></li>
                    <li class="page-item"><a class="page-link" href="?page=14">14</a></li>

                    <li class="page-item">
                        <a class="page-link" href="?page=2" aria-label="Suivant &raquo;">»</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection

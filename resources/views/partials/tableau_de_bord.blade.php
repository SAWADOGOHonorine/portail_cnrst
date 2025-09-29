@extends('layouts.app') 

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tableau de bord</h2>

    <div class="row">
        <!-- Publications -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Publications</h5>
                    <p class="card-text display-4">{{ $publications }}</p>
                </div>
            </div>
        </div>

        <!-- Enseignants -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Enseignants-Chercheurs</h5>
                    <p class="card-text display-4">{{ $enseignants }}</p>
                </div>
            </div>
        </div>

        <!-- Partenaires -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Partenaires</h5>
                    <p class="card-text display-4">{{ $partenaires }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

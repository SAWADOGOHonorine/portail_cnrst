@extends('layouts.admin')

@section('title', 'Profil')

@section('content')
<div class="container">
    <h1 class="mb-4">Profil de {{ auth()->user()->first_name }}</h1>

    <!-- is-admin permet de distinguer les rôles -->
    <div class="card">
        <div class="card-body">
            <p><strong>Nom :</strong> {{ auth()->user()->last_name }}</p>
            <p><strong>Prénom :</strong> {{ auth()->user()->first_name }}</p>
            <p><strong>Email :</strong> {{ auth()->user()->email }}</p>
            <p><strong>Adresse :</strong> {{ auth()->user()->adresse }}</p>
            <p><strong>Rôle :</strong> {{ auth()->user()->role }}</p>
        </div>
    </div>
</div>
@endsection

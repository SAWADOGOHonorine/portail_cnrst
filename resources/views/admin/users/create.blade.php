@extends('layouts.admin')

@section('title', 'Créer un utilisateur')

@section('content')
<div class="container mt-4">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

    <h1 class="mb-4">Créer un nouvel utilisateur</h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rôle</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="super_admin">super_admin</option>
                <option value="dga">DGA</option>
                <option value="dg">DG</option>
                <option value="directeur">Directeur</option>
                <option value="directeur_institut">Directeur_institut</option>
                <option value="chef_departement">Chef_departement</option>
                <option value="user">Utilisateur</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
    </form>

</div>
@endsection

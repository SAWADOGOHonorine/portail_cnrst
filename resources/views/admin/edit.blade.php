@extends('layouts.admin')

@section('title', 'Éditer l’utilisateur')

@push('styles')
<style>
/* Container général */
.container {
    max-width: 700px;
    margin: 30px auto;
    background-color: #ffffff;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', sans-serif;
}

/* Titre */
h1 {
    text-align: center;
    color: #28a745;
    margin-bottom: 25px;
    font-size: 28px;
}

/* Formulaire */
form {
    display: flex;
    flex-direction: column;
}

/* Labels */
form label {
    font-weight: 600;
    margin-bottom: 5px;
    color: #333333;
}

/* Inputs & selects */
form input[type="text"],
form input[type="email"],
form select {
    padding: 10px 12px;
    border: 1px solid #ced4da;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 16px;
    transition: 0.3s;
}

form input[type="text"]:focus,
form input[type="email"]:focus,
form select:focus {
    outline: none;
    border-color: #28a745;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
}

/* Bouton */
form button {
    background-color: #28a745;
    color: #ffffff;
    border: none;
    padding: 12px;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

form button:hover {
    background-color: #218838;
}

/* Messages */
.alert {
    margin-bottom: 20px;
    padding: 10px 15px;
    border-radius: 8px;
}

/* Responsive */
@media (max-width: 768px) {
    .container {
        padding: 20px;
        margin: 15px;
    }

    h1 {
        font-size: 24px;
    }
}
</style>
@endpush

@section('content')
<div class="container">
    <h1>Éditer l’utilisateur</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="first_name">Prénom</label>
        <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" required>

        <label for="last_name">Nom</label>
        <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>

        <label for="role">Rôle</label>
        <select id="role" name="role" required>
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Utilisateur</option>
            <option value="superadmin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super_Admin</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="directeur" {{ $user->role == 'directeur' ? 'selected' : '' }}>Directeur</option>
            <option value="directeur_institut" {{ $user->role == 'directeur_institut' ? 'selected' : '' }}>Directeur_institut</option>
            <option value="dg" {{ $user->role == 'dg' ? 'selected' : '' }}>DG</option>
            <option value="dga" {{ $user->role == 'dga' ? 'selected' : '' }}>DGA</option>
            <option value="dga" {{ $user->role == 'chef_departement' ? 'selected' : '' }}>chef_departement</option>
        </select>

        <button type="submit">Enregistrer</button>
    </form>
</div>
@endsection

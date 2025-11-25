@extends('layouts.app')

@section('title', 'Activation du compte')

@section('content')
<div class="container" style="max-width: 500px; margin-top: 50px;">
    <h1 class="text-center text-success mb-4">Activation du compte</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('user.activate.submit', $token) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Activer mon compte</button>
    </form>
</div>
@endsection

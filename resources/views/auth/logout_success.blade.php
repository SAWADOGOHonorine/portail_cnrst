{{-- resources/views/logout-success.blade.php --}}
@extends('layouts.app')

@section('title', 'Déconnexion réussie')

@section('content')
<div class="logout-container">
    <h2>Vous êtes maintenant déconnecté</h2>
    <p>Merci pour votre visite. <br>Vous pouvez vous reconnecter ou retourner à la page d’accueil.</p>

    <div class="logout-actions">
        <a href="{{ route('login') }}" class="btn btn-primary">🔐 Se reconnecter</a>
        <a href="{{ url('/') }}" class="btn-retour">Retour à l’accueil</a>
    </div>
</div>
@endsection

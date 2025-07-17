@extends('layouts.guest')

<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@section('content')
<div class="form-login">
    <div class="form-title-banner">
        <h2>Créer un compte</h2>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="input-login" required placeholder="votre email">
        @if($errors->has('email'))
            <div class="input-error">{{ $errors->first('email') }}</div>
        @endif

        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="input-login" required placeholder="votre mot de passe">

        <label for="password_confirmation" class="form-label">Confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="input-login" required placeholder="votre mot de passe">

        <button type="submit" class="button-login">Créer mon compte</button>

        <div class="form-bottom-links">
            <!-- <a href="{{ route('custom.login') }}" class="link-login">Retour à la connexion</a> -->
            
            <span>Déjà un compte ?</span>
            <span class="link-separator">|</span>
            <a href="{{ route('custom.login') }}" class="link-login">Se connecter</a>
        </div>
    </form>
</div>
@endsection

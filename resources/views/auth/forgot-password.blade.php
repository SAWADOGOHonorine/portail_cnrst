@extends('layouts.guest')

<link rel="stylesheet" href="{{ asset('css/motpasseoublie.css') }}">

@section('content')
<div class="forgot-wrapper">
    <div class="form-login">
        <h2>Mot de passe oublié</h2>

        <p class="form-description-left">
            Le mot de passe sera envoyé à votre email
        </p>

        <!-- condition -->
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif


        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email">Votre Email</label>
            <input type="email" id="email" name="email" class="input-login" placeholder="email@exemple.com" required>

            <button type="submit" class="button-login">Envoyer</button>
        </form>

        <div class="form-bottom-links">
            <a href="{{ route('custom.login') }}" class="link-login">Retour à la connexion</a>
            <span class="link-separator">|</span>
            <span>Pas encore un compte ?</span>
            <a href="{{ route('register') }}" class="link-login">Créer mon compte</a>
        </div>
    </div>
</div>

@endsection



@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/formlogin.css') }}">

@section('content')
<div class="form-wrapper">
    <div class="form-login">
        <h2>Connectez-vous à votre compte</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium text-gray-700">Email</label>
                <input type="email" name="email" required class="input-login" placeholder="votre email" />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="password" required class="input-login" placeholder="votre mot de passe" />
            </div>

            <button type="submit" class="button-login">
                Envoyer
            </button>

            <!-- les liens -->
            <div class="form-bottom-links">
                <a href="{{ route('password.request') }}" class="link-login">Mot de passe oublié ?</a>
                <span class="link-separator">|</span>
                <span>Pas encore un compte ?</span>
                <a href="{{ route('register') }}" class="link-login">Créer mon compte</a>
            </div>
        </form>
    </div>
</div>
@endsection

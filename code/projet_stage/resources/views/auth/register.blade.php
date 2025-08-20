@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/troisformulaire.css') }}">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

@section('content')
<div class="form-wrapper">
    <div class="form-login">
        <h2>Créer mon compte</h2>

            {{-- Affiche les erreurs --}}
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Affiche le message de succès --}}
        @if (session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-content">
            <label for="name">Nom</label>
            <input type="text" name="last_name" id="last_name" class="input-login" placeholder="Saisissez votre adresse e-mail" required>

                <label for="email">Prénom</label>
                <input type="text" name="first_name" id="first_name" class="input-login" placeholder="Saisissez votre prenom" required>

                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" class="input-login" placeholder="Saisissez votre adresse e-mail" required>

                <label for="adresse">Adresse</label>
                <input type="adresse" name="adresse" id="adresse" class="input-login" placeholder="Saisissez votre adresse" required>

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="input-login" placeholder="Saisissez votre mot de passe" required>

                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input-login" placeholder="Saisissez votre mot de passe" required>

                <button type="submit" class="button-login">Créer mon compte</button>
            </div>

            <div class="form-bottom-links">
                <a href="{{ route('login') }}" class="link-login">Retour à la connexion</a>
                <span class="link-separator">Déjà un compte?</span>
                <a href="{{ route('login') }}" class="link-login"> Se connecter</a>
            </div>
        </form>
    </div>
</div>
@endsection


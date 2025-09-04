@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/troisformulaire.css') }}">
<link rel="stylesheet" href="{{ asset('css/formlogin.css') }}">

@section('content')
<div class="form-wrapper">
    <div class="form-login">
        <h2>Connectez à votre compte</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf
            <div class="form-content">
                    <label for="email">Adresse e-mail:</label>
                    <input type="email" name="email" id="email" class="input-login" placeholder="Sasissez votre adresse e-mail" required>
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" class="input-login" placeholder="Saisissez votre mot de passe"required>
                <button type="submit" class="button-login">Connexion</button>
            </div>

            <div class="form-bottom-links">
                <a href="{{ route('password.request') }}" class="link-login">Mot de passe oublié ?</a>
                <span class="link-separator">|</span>
                <span class="link-separator">Pas encore un compte?</span>
                <a href="{{ route('register') }}" class="link-login">Créer un compte</a>
            </div>
        </form>
    </div>
</div>
@endsection


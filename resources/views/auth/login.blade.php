 @extends('layouts.app') 

<link rel="stylesheet" href="{{ asset('css/troisformulaire.css') }}">
<link rel="stylesheet" href="{{ asset('css/formlogin.css') }}">

      <div style="display:flex; justify-content:center;">
    @if (session('success'))
        <div id="alert-message" class="custom-success" style="width:50%; text-align:center; background-color: #28a745; color: white; padding: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div id="alert-message" class="alert alert-danger" style="width:50%; text-align:center;">
            <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
</div>

<script>
    // Sélectionne tous les messages d'alerte
    const alerts = document.querySelectorAll('#alert-message');

    alerts.forEach(alertMsg => {
        setTimeout(() => {
            alertMsg.style.transition = 'opacity 0.5s';
            alertMsg.style.opacity = '0';
            setTimeout(() => alertMsg.remove(), 400);
        }, 5000); // 5 secondes
    });
</script>


 @section('content') 
<div class="form-wrapper">
    <div class="form-login">
        <h2>Connectez à votre compte</h2>

        <form method="POST" action="{{ route('login.attempt') }}" autocomplete="off">
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


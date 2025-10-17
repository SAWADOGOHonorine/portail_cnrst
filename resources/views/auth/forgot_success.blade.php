
<link rel="stylesheet" href="{{ asset('css/forgot_success.css') }}">

<div class="form-wrapper">
    <div class="form-login">
        <h2>Demande envoyée !</h2>
        <p>
            Si l'adresse e-mail que vous avez saisie correspond à un compte,
            vous recevrez un lien pour réinitialiser votre mot de passe.
        </p>
        <a href="{{ route('login') }}" class="button-login">Retour à la connexion</a>
    </div>
</div>




<link rel="stylesheet" href="{{ asset('css/troisformulaire.css') }}">
<link rel="stylesheet" href="{{ asset('css/motpasseoublie.css') }}">


<div class="form-wrapper">
    <div class="form-login">
        <h2>Mot de passe oublié!</h2>

        {{-- Affichage du message de succès --}}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        {{-- Affichage des erreurs --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-content">
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" class="input-login" placeholder="Saisissez votre adresse e-mail" required>

                <button type="submit" class="button-login">Envoyer</button>
            </div>

            <div class="form-bottom-links">
                <a href="{{ route('login') }}" class="link-login">Retour à la connexion</a>
                <span class="link-separator">Pas encore un compte?</span>
                <span class="link-separator">|</span>
                <a href="{{ route('register') }}" class="link-login">Créer un compte</a>
            </div>
        </form>
    </div>
</div>




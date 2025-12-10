


<link rel="stylesheet" href="{{ asset('css/troisformulaire.css') }}">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">



<div class="form-wrapper">
    <div class="form-login">
        <h2>Créer mon compte</h2>

        {{-- Messages d'erreurs --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Message de succès --}}
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-content">

                <label for="last_name">Nom</label>
                <input type="text" name="last_name" id="last_name" class="input-login" placeholder="Saisissez votre nom" required>

                <label for="first_name">Prénom</label>
                <input type="text" name="first_name" id="first_name" class="input-login" placeholder="Saisissez votre prénom" required>

                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" class="input-login" placeholder="Saisissez votre adresse e-mail" required>

                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="input-login" placeholder="Saisissez votre adresse" required>

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="input-login" placeholder="Saisissez votre mot de passe" required>

                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input-login" placeholder="Confirmez votre mot de passe" required>

                <button type="submit" class="button-login">Créer mon compte</button>
            </div>

            <div class="form-bottom-links">
                <a href="{{ route('login') }}" class="link-login">Retour à la connexion</a>
                <span class="link-separator">|</span>
                <a href="{{ route('login') }}" class="link-login">Se connecter</a>
            </div>
        </form>
    </div>
</div>


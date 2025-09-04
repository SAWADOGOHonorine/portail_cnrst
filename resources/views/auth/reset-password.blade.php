<!DOCTYPE html>
<html>
<head>
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
<h2>Nouveau mot de passe</h2>

<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" placeholder="Votre email" required>
    <input type="password" name="password" placeholder="Nouveau mot de passe" required>
    <input type="password" name="password_confirmation" placeholder="Confirmez le mot de passe" required>
    <button type="submit">Réinitialiser</button>
</form>
</body>
</html>

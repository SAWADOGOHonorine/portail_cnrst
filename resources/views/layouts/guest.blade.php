<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion invité</title>
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formlogin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
</head>
<body>
    @include('layouts.navigation')

    <main>
        @yield('content')
    </main>
</body>
</html>

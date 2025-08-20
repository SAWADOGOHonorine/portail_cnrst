<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'portail_cnrst') }}</title>

    <!-- les liens Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
</head>

<body class="font-sans antialiased bg-gray-100">

    @include('layouts.navigation')

    @if (isset($header) && !Request::is('login'))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <main>
        @yield('content')
    </main>

    <!--  Footer masqué sur /connexion -->
            @php
            $hideFooter = Request::is('login') || Request::is('forgot-password') || Request::is('register');
        @endphp

        @if (!$hideFooter)
            @include('components.footer')
        @endif
</body>
</html>

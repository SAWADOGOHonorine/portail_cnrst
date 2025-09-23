<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'portail_cnrst') }}</title>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- CSS institutionnel -->
    <link href="{{ asset('css/navigation.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer_top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/formlogin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/logout_success.css') }}" rel="stylesheet">

    <!-- PDF CV (si utilisé dans une vue spécifique) -->
    @if(View::hasSection('cv_pdf'))
        <link rel="stylesheet" href="{{ public_path('css/mon_espace/cv_pdf.css') }}">
    @endif

    @stack('styles')
</head>

<body class="font-sans antialiased bg-gray-100 d-flex flex-column min-vh-100">
    @php
        $hideNav = Request::is('login') || Request::is('register') || Request::is('forgot-password') || Request::is('logout_success');
    @endphp

    @unless($hideNav)
        @include('layouts.navigation')
    @endunless
    @yield('home')

    <main class="main-content flex-grow-1">
        @yield('content')
        @include('components.stats_banner')
    </main>

    @unless($hideNav)
        @include('components.footer')
    @endunless

    <!-- Scroll to top -->
    <!-- <a href="#" class="scroll-top" aria-label="Retour en haut">
        <i class="fas fa-arrow-up"></i>
    </a> -->

    <!-- JS pour padding dynamique -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const header = document.querySelector("header");
            const main = document.querySelector(".main-content");
            if (header && main) {
                main.style.paddingTop = header.offsetHeight + "px";
            }
        });
    </script>

    <!-- Scripts institutionnels -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/about_direction.js') }}"></script>
    <script src="{{ asset('js/navigation.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>


    <script>
        document.querySelector('.scroll-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>


   



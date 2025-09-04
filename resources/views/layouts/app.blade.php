<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'portail_cnrst') }}</title>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/formlogin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navigation.css') }}" rel="stylesheet">
    <link href="{{ asset('css/logout_success.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/contact.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/footer_top.css') }}">
    
    @stack('styles')
</head>

<body class="font-sans antialiased bg-gray-100">
    @php
        $hideNav = Request::is('login') || Request::is('register') || Request::is('forgot-password');
    @endphp

    @if (!$hideNav)
        @include('layouts.navigation')
    @endif

    @yield('home')
    @yield('contact')
     @yield('about.partenariat')
     @yield('content')
    

    @if (!$hideNav)
     <link rel="stylesheet" href="{{ asset('css/footer_top.css') }}">
      @include('components.footer_top')
      @include('components.footer')
    @endif
    

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

    <!-- Scripts -->
    <script src="{{ asset('js/navigation.js') }}"></script>
    <script src="{{ asset('js/pagehome.js') }}"></script>

    <a href="#" class="scroll-top" aria-label="Retour en haut">
        <i class="fas fa-arrow-up"></i>
    </a>
    <script>
        document.querySelector('.scroll-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    <script src="{{ asset('js/pagehome.js') }}"></script>

</body>
</html>

   



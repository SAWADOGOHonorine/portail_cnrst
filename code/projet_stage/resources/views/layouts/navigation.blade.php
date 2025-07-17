
<script src="{{ asset('js/navigation.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/navigation.css') }}">

<nav class="navbar">
    <div class="nav-inner">
        <!-- Logo -->
        <div>
            <a href="/" class="nav-logo">
                Portail CNRST
            </a>
        </div>

        <!-- Desktop: Connexion -->
        <div class="nav-desktop">
            <a href="{{ route('custom.login') }}" class="nav-link">
                Connexion
            </a>
        </div>

        <!-- Hamburger (mobile) -->
        <div class="nav-mobile-toggle">
            <!-- <button onclick="toggleMenu()" class="hamburger-button"> -->
                <!-- Simple icône burger -->
                <!-- <span>&#9776;</span>
            </button> -->
        </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobileMenu" class="mobile-menu">
        <a href="{{ route('custom.login') }}" class="nav-link-mobile">
            Connexion
        </a>
    </div>
</nav>



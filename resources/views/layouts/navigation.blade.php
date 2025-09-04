<div class="cnest-banner">
  <h1 class="cnest-marquee">
    <span class="rouge">C</span>entre 
    <span class="rouge">N</span>ational 
    de la <span class="rouge">R</span>echerche 
    <span class="rouge"> S</span>cientifique 
    et <span class="rouge"> T</span>echnologique
  </h1>
</div>

<header class="header-institutionnel" id="headerInstitutionnel">
    <div class="menu-wrapper">
 
        <button class="nav-toggle" onclick="document.getElementById('navMenu').classList.toggle('show')">
            ☰
        </button>

        <nav class="nav-horizontal" id="navMenu">
            <div class="logo-container">
                <a href="#">
                    <img src="{{ asset('images/imagecnrst.png') }}" alt="Logo CNRST" class="logo-cnrst">
                </a>
            </div>
            
            <ul class="nav-links">
                <li><a href="/home" class="btn-accueil {{ request()->is('home') ? 'active' : '' }}">ACCUEIL</a></li>
                <li class="has-submenu">
                    <a href="/about" class="{{ request()->is('about*') ? 'active' : '' }}">
                        A propos <i class="bi bi-chevron-down submenu-icon"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="/about/qui somme nous?">Qui sommes nous?</a></li>
                        <li><a href="/about/directions">Nos directions</a></li>
                        <li><a href="/about/organigramme">Organigramme</a></li>
                        <li><a href="/about/partenariat">Partenariats</a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="/programmes" class="{{ request()->is('programmes*') ? 'active' : '' }}">
                        Programmes <i class="bi bi-chevron-down submenu-icon"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="/programmes/recherche">Recherche</a></li>
                        <li><a href="/programmes/innovation">Innovation</a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="/news" class="{{ request()->is('news*') ? 'active' : '' }}">
                        Actualités <i class="bi bi-chevron-down submenu-icon"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="/news/nationale">Nationale</a></li>
                        <li><a href="/news/internationale">Internationale</a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="/faq" class="{{ request()->is('faq*') ? 'active' : '' }}">
                        FAQ <i class="bi bi-chevron-down submenu-icon"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="/faq/inscription">Questions</a></li>
                        <li><a href="/faq/financement">Forum</a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="/media" class="{{ request()->is('media*') ? 'active' : '' }}">
                        Médias <i class="bi bi-chevron-down submenu-icon"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="/media/photos">Photos</a></li>
                        <li><a href="/media/videos">Vidéos</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contacts</a>
                </li>
            </ul>

            <div class="header-actions">
                <div class="search-container">
                    <a href="#" class="search-trigger flex items-center gap-2">
                        <i class="fas fa-search text-lg"></i>
                    </a>

                    <form action="/search" method="GET" class="search-form">
                        <input type="text" name="query" placeholder="Saisir votre recherche..." required>
                        <button type="submit">Démarrer la recherche</button>
                    </form>
                </div>

                <div class="login-container">
                    <a href="/login" class="login-button">Connexion</a>
                </div>
            </div>

            <div class="lang-select">
                <select name="lang" onchange="location.href=this.value">
                    <option value="?lang=fr" selected>Français</option>
                    <option value="?lang=en">English</option>
                    <option value="?lang=de">Allemand</option>
                    <option value="?lang=it">Italiano</option>
                </select>
            </div>
        </nav>
    </div>
</header>












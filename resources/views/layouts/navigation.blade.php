<header class="header-progres">
  <nav class="nav-progres">
    <div class="menu-row">
      
      <!-- Logo ProGRES -->
      <div class="logo-progres">
        <div class="logo-text">
          <span class="logo-red">Pr</span>
          <span class="logo-icon"><i class="bi bi-search"></i></span>
          <span class="logo-black">GRES</span>
        </div>
        <div class="logo-slogan">Suivi – Traçabilité de la Recherche</div>
      </div>

      <!-- Bouton burger (mobile) -->
      <button class="menu-toggle" aria-label="Ouvrir le menu" onclick="document.getElementById('menuLinks').classList.toggle('open')">☰</button>

      <!-- Menu principal -->
      <div class="menu-container" id="menuLinks">
        <ul class="menu-links">
          <li class="{{ request()->is('chercheurs') ? 'active' : '' }}">
            <a href="{{ url('chercheurs') }}">CHERCHEURS</a>
          </li>

          <li class="{{ request()->is('publications') || request()->routeIs('fiches_detail') ? 'active' : '' }}">
            <a href="{{ url('/publications') }}">PUBLICATIONS</a>
          </li>

          <li class="{{ request()->is('laboratoires') ? 'active' : '' }}">
            <a href="{{ url('/laboratoires') }}">LABORATOIRES</a>
          </li>

          <li class="{{ request()->is('equipes') ? 'active' : '' }}">
            <a href="{{ url('/equipes') }}">ÉQUIPES</a>
          </li>

          <li class="{{ request()->is('evenements') ? 'active' : '' }}">
            <a href="{{ url('/evenements') }}">EVÉNEMENTS</a>
          </li>

          <li class="{{ request()->is('equipements') ? 'active' : '' }}">
            <a href="{{ url('/equipements') }}">ÉQUIPEMENTS</a>
          </li>

          <li class="{{ request()->is('valorisations') ? 'active' : '' }}">
            <a href="{{ url('valorisations') }}">VALORISATIONS</a>
          </li>

          <li class="{{ request()->is('partenaires') ? 'active' : '' }}">
            <a href="{{ url('/partenaires') }}">PARTENAIRES</a>
          </li>
        </ul>

        <!-- Connexion -->
        <div class="connexion-wrapper-below">
          <span class="login-separator"></span>
          <a href="/login" class="btn-connexion">
            <i class="bi bi-lock-fill me-1"></i> CONNEXION
          </a>
        </div>
      </div>
    </div>
  </nav>
</header>

















































<!-- <div class="cnest-banner">
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
    <nav class="nav-horizontal" id="navMenu">
      <div class="logo-container">
        <a href="/">
          <img src="{{ asset('images/imagecnrst.png') }}" alt="Logo CNRST" class="logo-cnrst">
        </a>
      </div>

      <ul class="nav-links">
        <li><a href="/home" class="{{ request()->is('home') ? 'active' : '' }}">ACCUEIL</a></li>

        <li class="has-submenu {{ request()->is('about*') ? 'open' : '' }}">
          <a href="/about" class="{{ request()->is('about*') ? 'active' : '' }}">
            À propos <span class="submenu-icon"></span>
          </a>
          <ul class="submenu">
            <li><a href="/about/qui-sommes-nous">Qui sommes-nous ?</a></li>
            <li><a href="/about/directions">Nos directions</a></li>
            <li><a href="/about/organigramme">Organigramme</a></li>
            <li><a href="/about/partenariat">Partenariats</a></li>
          </ul>
        </li>

        <li class="has-submenu {{ request()->is('programmes*') ? 'open' : '' }}">
          <a href="/programmes" class="{{ request()->is('programmes*') ? 'active' : '' }}">
            Programmes <span class="submenu-icon"></span>
          </a>
          <ul class="submenu">
            <li><a href="/programmes/recherche">Recherche</a></li>
            <li><a href="/programmes/innovation">Innovation</a></li>
          </ul>
        </li>

        <li class="has-submenu {{ request()->is('news*') ? 'open' : '' }}">
          <a href="/news" class="{{ request()->is('news*') ? 'active' : '' }}">
            Actualités <span class="submenu-icon"></span>
          </a>
          <ul class="submenu">
            <li><a href="/news/nationale">Nationale</a></li>
            <li><a href="/news/internationale">Internationale</a></li>
          </ul>
        </li>

        <li class="has-submenu {{ request()->is('faq*') ? 'open' : '' }}">
          <a href="/faq" class="{{ request()->is('faq*') ? 'active' : '' }}">
            FAQ <span class="submenu-icon"></span>
          </a>
          <ul class="submenu">
            <li><a href="/faq/inscription">Questions</a></li>
            <li><a href="/faq/financement">Forum</a></li>
          </ul>
        </li>

        <li class="has-submenu {{ request()->is('media*') ? 'open' : '' }}">
          <a href="/media" class="{{ request()->is('media*') ? 'active' : '' }}">
            Médias <span class="submenu-icon"></span>
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
      <div class="search-container">
        <a href="#" class="search-trigger" onclick="toggleSearchForm()" title="Recherche">
          <i class="fas fa-search search-icon"></i> {{-- ou bi bi-search --}}
        </a>

        <form action="{{ route('search') }}" method="GET" class="search-form" id="searchForm">
          <input type="text" name="query" placeholder="Saisir votre recherche..." required>
          <button type="submit">Demarrer la Rechercher</button>
        </form>
      </div>


      <div class="header-actions">
        <div class="login-container">
          <a href="/login" class="login-button">Connexion</a>
        </div>
        <div class="lang-select">
          <select name="lang" onchange="location.href=this.value">
            <option value="?lang=fr" selected>Français</option>
            <option value="?lang=en">English</option>
            <option value="?lang=de">Allemand</option>
            <option value="?lang=it">Italiano</option>
          </select>
        </div>
      </div>
    </nav>
  </div>
</header> -->















<header class="sticky-header">
      <link rel="stylesheet" href="{{ asset('css/navigation.css') }}"> 
  <div class="top-bar">
    <div class="contact-info">
      <span>📞 +226 79 51 31 63</span>
      <span>✉️ contact@cnrst.bf</span>
      <span>📍  Ouagadougou, Burkina Faso</span>
    </div>
    <div class="lang-social">
      <div class="lang-switch">
        <a href="#">FR</a> | <a href="#">EN</a>
      </div>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
  </div>

  <nav class="main-nav">
    <div class="logo"><a href="/">CNRST</a></div>

    <div class="menu-icon" onclick="toggleMenu(this)">
      <span></span><span></span><span></span>
    </div>

    <ul class="nav-links">
      <li><a href="/home">Accueil</a></li>
      <li><a href="/about">À propos</a></li>
      <li><a href="/programmes">Programmes</a></li>
      <li><a href="/news">Actualités</a></li>
      <li><a href="/faq">FAQ</a></li>
      <li><a href="/media">Médias</a></li>
      <li><a href="/contact">Contacts</a></li>
    </ul>

    <div class="search-login">
      <li>
    <a href="#" onclick="openSearchModal()" class="flex items-center gap-2">
        <i class="fas fa-search text-lg"></i>
        <span></span>
    </a>
</li>

      <a href="/login" class="login-button">Connexion</a>
    </div>
  </nav>

  <script src="{{ asset('js/navigation.js') }}"></script>
</header>










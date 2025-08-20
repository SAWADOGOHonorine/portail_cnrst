<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>

    <!--  le liens CSS (Bootstrap + ton CSS perso) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
          <!-- menu latéral -->
    <div id="sidebar">

        <!--  Titre/Logo du menu -->
        <div class="sidebar-header p-3 text-white fw-bold">
            Mon Admin
        </div>

        <!--   mon espace avec le sous-menu -->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-white" id="monEspaceDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-2"></i> Mon espace
            </a>
            <ul class="dropdown-menu dropdown-menu-custom ms-5" aria-labelledby="monEspaceDropdown">
                <li><a class="dropdown-item" href="#" onclick="loadContent('documentation/cv')"><i class="bi bi-file-earmark-person me-2"></i> Mon CV</a></li>
                <li><a class="dropdown-item" href="#" onclick="loadContent('documentation/fiches')"><i class="bi bi-journal-text me-2"></i> Mes fiches techniques</a></li>
                <li><a class="dropdown-item" href="#" onclick="loadContent('documentation/articles')"><i class="bi bi-file-earmark-richtext me-2"></i> Mes articles</a></li>
                <li><a class="dropdown-item" href="#" onclick="loadContent('documentation/autre')"><i class="bi bi-three-dots me-2"></i> Autres</a></li>
            </ul>
        </li>

        <!--  Menu principal -->
        <ul class="nav flex-column">

            <!-- Tableau de bord -->
            <li class="nav-item">
                <a href="#" class="nav-link text-white" onclick="loadContent('dashboard')">
                    <i class="bi bi-speedometer2 me-2"></i> <span class="link-text">Tableau de bord</span>
                </a>
            </li>

            <!-- Accueil -->
            <li class="nav-item">
                <a href="#" class="nav-link text-white" onclick="loadContent('accueil')">
                    <i class="bi bi-house-door me-2"></i> <span class="link-text">Accueil</span>
                </a>
            </li>

            <!-- Infos -->
            <li class="nav-item">
                <a href="#" class="nav-link text-white" onclick="loadContent('infos')">
                    <i class="bi bi-info-circle me-2"></i> <span class="link-text">Infos</span>
                </a>
            </li>

            <!-- la documentation avec le sous-menu -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle text-white me-5" id="documentationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-journal-bookmark me-2"></i> Documentation
                </a>
                <ul class="dropdown-menu dropdown-menu-custom" aria-labelledby="documentationDropdown">
                    <li><a class="dropdown-item" href="#" onclick="loadContent('documentation/cv')"><i class="bi bi-file-earmark-person me-2"></i> Mon CV</a></li>
                    <li><a class="dropdown-item" href="#" onclick="loadContent('documentation/fiches')"><i class="bi bi-journal-text me-2"></i> Mes fiches techniques</a></li>
                    <li><a class="dropdown-item" href="#" onclick="loadContent('documentation/articles')"><i class="bi bi-file-earmark-richtext me-2"></i> Mes articles</a></li>
                    <li><a class="dropdown-item" href="#" onclick="loadContent('documentation/autre')"><i class="bi bi-three-dots me-2"></i> Autres</a></li>
                </ul>
            </li>
        </ul>
    </div>
         <!-- le contenu principal -->
    <div id="main">
              <!-- TOPBAR ( la barre supérieure) -->
        <nav id="topbar" class="d-flex justify-content-between align-items-center px-3">
            <!-- Bouton toggle + Titre -->
            <div class="d-flex align-items-center">
                <button id="toggleSidebar" class="btn text-white me-3"><i class="bi bi-list fs-4"></i></button>
                <span class="fw-bold text-white">@yield('title', 'Dashboard')</span>
            </div>
            <!-- Barre de recherche -->
            <div class="input-group" style="width: 300px;">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i> 
                </span>
                <input type="text" class="form-control input-dark border-start-0" placeholder="Rechercher..." name="search" />
            </div>
            <!-- Icône notifications -->
            <div class="position-relative me-3">
                <i class="bi bi-bell-fill fs-4 text-white"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3
                    <span class="visually-hidden">notifications non lues</span>
                </span>
            </div>

            <!-- le logo admin avec menu dropdown -->
            <div class="admin-logo-container">
                <i class="bi bi-person-circle fs-4 text-white" id="adminLogo" style="cursor: pointer;"></i>
                <div class="admin-dropdown hidden mt-3" id="adminDropdown">
                    <span class="admin-email">Email : {{ Auth::user()->email }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">Déconnexion</button>
                    </form>
                </div>
            </div>
        </nav>
            <!-- le contenu des pages -->
        <div class="container-fluid mt-4"  id="content-area">
            <h2>Bienvenue sur le Dashboard</h2>
            <p>Sélectionnez un menu à gauche.</p>
        </div>
    </div>
   
         <!-- les  scripts utilisés -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap + CSS perso -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mon_espace/cv_form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mon_espace/fiche.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <!-- Sidebar -->
    <div id="sidebar">
        <div class="sidebar-header p-3 text-white fw-bold">
            Mon Admin
        </div>

        <ul class="nav flex-column">
            <!-- Mon espace -->
            <li class="nav-item">
                <a class="nav-link text-white d-flex justify-content-between align-items-center"
                   data-bs-toggle="collapse" href="#monEspaceMenu" role="button" aria-expanded="false"
                   aria-controls="monEspaceMenu">
                    <span><i class="bi bi-person-circle me-2"></i> Mon espace</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <div class="collapse ms-4" id="monEspaceMenu">
                    <ul>
                        <li><a class="nav-link" href="#" onclick="loadContent('mon_espace/cv_form')">
                            <i class="bi bi-file-earmark-person me-2"></i> Mon CV</a></li>
                        <li><a class="nav-link" href="#" onclick="loadContent('mon_espace/fiches')">
                            <i class="bi bi-journal-text me-2"></i> Mes fiches Techniques </a></li>
                        <li><a class="nav-link" href="#" onclick="loadContent('mon_espace/articles')">
                            <i class="bi bi-file-earmark-richtext me-2"></i> Mes articles</a></li>
                        <li><a class="nav-link" href="#" onclick="loadContent('documentation/autre')">
                            <i class="bi bi-three-dots me-2"></i> Autres</a></li>
                    </ul>
                </div>
            </li>

            <!-- Tableau de bord -->
            <li class="nav-item">
                <a href="#" class="nav-link text-white" onclick="loadContent('dashboard')">
                    <i class="bi bi-speedometer2 me-2"></i> Tableau de bord
                </a>
            </li>

            <!-- Accueil -->
            <li class="nav-item">
                <a href="#" class="nav-link text-white" onclick="loadContent('accueil')">
                    <i class="bi bi-house-door me-2"></i> Accueil
                </a>
            </li>

            <!-- Infos -->
            <li class="nav-item">
                <a href="#" class="nav-link text-white" onclick="loadContent('infos')">
                    <i class="bi bi-info-circle me-2"></i> Infos
                </a>
            </li>

            <!-- Documentation -->
            <li class="nav-item">
                <a class="nav-link text-white d-flex justify-content-between align-items-center"
                   data-bs-toggle="collapse" href="#documentationMenu" role="button" aria-expanded="false"
                   aria-controls="documentationMenu">
                    <span><i class="bi bi-journal-bookmark me-2"></i> Documentation</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
             <div class="collapse ms-4" id="documentationMenu">
                <ul>
                    {{--  Lien vers le formulaire dans le dashboard --}}
                    <li>
                        <a class="nav-link" href="{{ route('publications.create') }}">
                            <i class="bi bi-file-earmark-person me-2"></i> Laboratoires
                        </a>
                    </li>

                    {{--  Liens vers les vues publiques chargées via JavaScript --}}
                    <li>
                        <a class="nav-link" href="#" onclick="loadContent('documentation/fiches')">
                            <i class="bi bi-journal-text me-2"></i> Equipements
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#" onclick="loadContent('documentation/articles')">
                            <i class="bi bi-file-earmark-richtext me-2"></i> Equipes
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#" onclick="loadContent('documentation/autre')">
                            <i class="bi bi-three-dots me-2"></i> Autres
                        </a>
                    </li>
                </ul>
            </div>
            </li>
        </ul>
    </div>

    <!-- Main content -->
    <div id="main">
        <!-- Topbar -->
        <nav id="topbar" class="d-flex justify-content-between align-items-center px-3">
            <div class="d-flex align-items-center">
                <button id="toggleSidebar" class="btn text-white me-3"><i class="bi bi-list fs-4"></i></button>
                <span class="fw-bold text-white">@yield('title', 'Dashboard')</span>
            </div>

            <!-- Search -->
            <div class="input-group" style="width: 300px;">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" class="form-control input-dark border-start-0" placeholder="Rechercher..." name="search" />
            </div>

            <!-- Notifications -->
            <div class="position-relative me-3">
                <i class="bi bi-bell-fill fs-4 text-white"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3
                    <span class="visually-hidden">notifications non lues</span>
                </span>
            </div>

            <!-- Admin dropdown -->
           <div class="admin-logo-container">
                <i class="bi bi-person-circle fs-4 text-white" id="adminLogo" style="cursor: pointer;"></i>

                <div class="admin-dropdown hidden mt-3" id="adminDropdown">
                     <!-- Email en haut, hors du bloc profil  -->
                    <span class="admin-email">{{ Auth::user()->email }}</span>

                    <hr class="admin-separator">

                    <a href="#" class="admin-link" id="toggleProfile">👤 Mon profil</a>

                    <div class="user-profile-details hidden mt-2" id="profileDetails">
                        <p><strong>Nom :</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Rôle :</strong> {{ Auth::user()->role ?? 'Utilisateur' }}</p>
                        <p><strong>Inscrit le :</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                        <a href="#" class="admin-link">🔐 Modifier le mot de passe</a>
                    </div>

                    <!-- Lien Paramètres en dehors du dropdown  -->
                    <div class="admin-settings-link mt-2">
                        <a href="#" class="admin-link">⚙️ Paramètres</a>
                    </div>

                    <hr class="admin-separator">

                     <!-- Bouton Déconnexion toujours visible  -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">🚪 Déconnexion</button>
                    </form>
                </div>
            </div>
           

        </nav>
        <!-- Zone de contenu dynamique -->
        <div class="container-fluid mt-4" id="content-area">
            <h2>Bienvenue sur le Dashboard</h2>
            <p>Sélectionnez un menu à gauche.</p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function loadContent(viewName) {
            fetch('/' + viewName)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('content-area').innerHTML = html;
                })
                .catch(error => {
                    console.error('Erreur lors du chargement :', error);
                    document.getElementById('content-area').innerHTML = '<div class="alert alert-danger">Erreur de chargement du contenu.</div>';
                });
        }
    </script>
    <script>
        function loadContent(viewName) {
            fetch(`/load-view/${viewName}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('main-content').innerHTML = html;
                })
                .catch(error => {
                    console.error('Erreur de chargement :', error);
                });
        }
    </script>

    <script src="{{ asset('js/dashboard.js') }}"></script>
   <script>
    document.getElementById('toggleProfile').addEventListener('click', function (e) {
        e.preventDefault();
        const profileBlock = document.getElementById('profileDetails');
        profileBlock.classList.toggle('hidden');
    });
    </script>

</body>
</html>



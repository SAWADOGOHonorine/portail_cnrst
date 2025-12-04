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
                    <i class="bi bi-chevron-down rotate-icon"></i>
                </a>
                <div class="collapse ms-3" id="monEspaceMenu">
                    <ul>
                        <li><a class="nav-link" href="#" onclick="loadContent('mon_espace/cv')"><i class="bi bi-file-earmark-person me-2"></i> Mon CV</a></li>
                        <li><a class="nav-link" href="#" onclick="loadContent('mon_espace/fiches')"><i class="bi bi-journal-text me-2"></i> Mes fiches Techniques</a></li>
                        <li><a class="nav-link" href="#" onclick="loadContent('mon_espace/articles')"><i class="bi bi-file-earmark-richtext me-2"></i> Mes articles</a></li>
                        <li><a class="nav-link" href="#" onclick="loadContent('mon_espace/articles')"><i class="bi bi-file-earmark-richtext me-2"></i> Documents de vulgarisation</a></li>
                        <li><a class="nav-link" href="#" onclick="loadContent('documentation/autre')"><i class="bi bi-three-dots me-2"></i> Autres</a></li>
                    </ul>
                </div>
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
                    <i class="bi bi-chevron-down rotate-icon"></i>
                </a>
                <div class="collapse ms-3" id="documentationMenu">
                    <ul>
                        <li><a class="nav-link" href="{{ route('publications.create') }}"><i class="bi bi-file-earmark-person me-2"></i> Laboratoires</a></li>
                        <li><a class="nav-link" href="#" onclick="loadContent('documentation/fiches')"><i class="bi bi-journal-text me-2"></i> Equipements</a></li>
                        <li><a class="nav-link" href="#" onclick="loadContent('documentation/articles')"><i class="bi bi-file-earmark-richtext me-2"></i> Equipes</a></li>
                        <li><a class="nav-link" href="#" onclick="loadContent('documentation/autre')"><i class="bi bi-three-dots me-2"></i> Autres</a></li>
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
                    <div class="admin-settings-link mt-2">
                        <a href="#" class="admin-link">⚙️ Paramètres</a>
                    </div>
                    <hr class="admin-separator">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">🚪 Déconnexion</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Contenu dynamique -->
        <div class="container-fluid mt-4" id="content-area">
            @if($messageType == 'welcome')
                <h2>Bienvenue sur votre espace</h2>
                <p>Vous êtes maintenant connecté.</p>
            @elseif($messageType == 'from_cv')
                <h2>Merci pour votre CV !</h2>
                <p>Vous pouvez continuer à explorer votre espace.</p>
            @endif
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('main');

        toggleSidebar.addEventListener('click', () => {
            if(window.innerWidth > 992){
                sidebar.classList.toggle('collapsed');
                main.classList.toggle('collapsed');
            } else {
                sidebar.classList.toggle('show');
                main.classList.toggle('shifted');
            }
        });

        // Profile toggle
        document.getElementById('toggleProfile').addEventListener('click', function(e){
            e.preventDefault();
            document.getElementById('profileDetails').classList.toggle('hidden');
        });

        // Content loader
        function loadContent(viewName){
            fetch('/' + viewName)
            .then(r => r.text())
            .then(html => { document.getElementById('content-area').innerHTML = html; })
            .catch(err => { console.error(err); });
        }
    </script>
    <script>
    // Toggle le dropdown admin
    const adminLogo = document.getElementById('adminLogo');
    const adminDropdown = document.getElementById('adminDropdown');

    adminLogo.addEventListener('click', () => {
        adminDropdown.classList.toggle('hidden');
    });

    // Toggle le bloc profil à l'intérieur du dropdown
    const toggleProfile = document.getElementById('toggleProfile');
    const profileDetails = document.getElementById('profileDetails');

    toggleProfile.addEventListener('click', (e) => {
        e.preventDefault();
        profileDetails.classList.toggle('hidden');
    });

    // Optionnel : fermer le dropdown si on clique en dehors
    document.addEventListener('click', (e) => {
        if (!adminLogo.contains(e.target) && !adminDropdown.contains(e.target)) {
            adminDropdown.classList.add('hidden');
            profileDetails.classList.add('hidden');
        }
    });
</script>

</body>
</html>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - @yield('title')</title>

    <!-- On garde Bootstrap juste pour la mise en page générale -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/layout/admin.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div class="d-flex" id="wrapper">
<!-- Sidebar -->
<div class="bg-dark text-white border-end" id="sidebar-wrapper">
            <div class="sidebar-heading p-3">Admin Dashboard</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="bi bi-speedometer2 me-2"></i> Tableau de bord
                </a>
                <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="bi bi-people me-2"></i> Gestion des utilisateurs
                </a>
                <a href="{{ route('admin.cvs') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="bi bi-file-earmark-person me-2"></i> CVs soumis
                </a>

                <a href="{{ route('admin.profile') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="bi bi-person-circle me-2"></i> Profil
                </a>
            </div>
        </div>

        <!-- Overlay (fond assombri sur mobile) -->
        <div id="overlay"></div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn menu-btn" id="menu-toggle">☰</button>

                    <ul class="navbar-nav ms-auto align-items-center">
                        @php
                            $unreadCount = auth()->user()->unreadNotifications->count();
                            $notifications = auth()->user()->notifications()->latest()->take(5)->get();
                        @endphp

                        <!-- Notifications -->
                        <li class="nav-item dropdown">
                            <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                                🔔
                                @if($unreadCount > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $unreadCount }}
                                    </span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @forelse($notifications as $notification)
                                    <li>
                                        <a class="dropdown-item" href="{{ $notification->data['url'] ?? '#' }}">
                                            {{ $notification->data['message'] ?? 'Notification' }}
                                            <br>
                                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                        </a>
                                    </li>
                                @empty
                                    <li><span class="dropdown-item">Aucune notification</span></li>
                                @endforelse
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-center" href="{{ route('admin.notifications.markAsRead') }}">Tout marquer comme lu</a></li>
                            </ul>
                        </li>

                        <!-- profile de deconnexion  -->
                       <li class="nav-item dropdown ms-3">
                            <a class="nav-link profile-avatar" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->first_name) }}&background=28a745&color=fff"
                                    alt="avatar">
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end profile-menu">
                                <li class="dropdown-header text-center fw-bold">
                                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                </li>

                                <li><hr class="dropdown-divider"></li>

                                <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profil</a></li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item">Déconnexion</button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                                        </ul>
                </div>
            </nav>

            <div class="container-fluid mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar
        const toggleButton = document.getElementById("menu-toggle");
        const wrapper = document.getElementById("wrapper");
        const overlay = document.getElementById("overlay");

        toggleButton.addEventListener("click", function(e) {
            e.preventDefault();
            wrapper.classList.toggle("toggled");
            overlay.classList.toggle("show");
        });

        overlay.addEventListener("click", function() {
            wrapper.classList.remove("toggled");
            overlay.classList.remove("show");
        });
    </script>
    <script>
    const sidebar = document.getElementById('sidebar');
const toggleBtn = document.getElementById('sidebarToggle');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
});
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>
</html>

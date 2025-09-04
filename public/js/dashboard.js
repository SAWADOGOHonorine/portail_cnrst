document.addEventListener('DOMContentLoaded', function () {
    // Sélecteurs principaux
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');
    const icon = document.querySelector('.rotate-icon');
    const submenu = document.getElementById('submenuDoc');
    const adminLogo = document.getElementById('adminLogo');
    const adminDropdown = document.getElementById('adminDropdown');
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    // Rotation de l’icône si sous-menu présent (Bootstrap collapse)
    document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(item => {
    item.addEventListener('click', function () {
        let icon = this.querySelector('i.bi-chevron-down');
        if (icon) {
            icon.classList.toggle('rotate');
        }
    });
});


    // Dropdown admin en haut à droite
    if (adminLogo && adminDropdown) {
        adminLogo.addEventListener('click', function (e) {
            e.stopPropagation();
            adminDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!adminLogo.contains(e.target) && !adminDropdown.contains(e.target)) {
                adminDropdown.classList.add('hidden');
            }
        });
    }

    // Bouton ☰ pour replier/ouvrir la sidebar
    if (toggleBtn && sidebar && main) {
        toggleBtn.addEventListener('click', () => {
            if (window.innerWidth <= 992) {
                sidebar.classList.toggle('show'); // Mobile
            } else {
                sidebar.classList.toggle('collapsed'); // Desktop
                main.classList.toggle('collapsed');
            }
        });
    }

    // Menu burger responsive
    if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', function () {
            this.classList.toggle('open');
            navLinks.classList.toggle('open');
        });
    }
});

// Chargement dynamique du contenu (ex: dashboard, documentation, etc.)
function loadContent(page) {
    fetch('/' + page)
        .then(response => {
            if (!response.ok) throw new Error('Réponse HTTP non valide');
            return response.text();
        })
        .then(html => {
            const contentArea = document.getElementById('content-area');
            if (contentArea) {
                contentArea.innerHTML = html;
            } else {
                console.warn('Zone de contenu introuvable');
            }
        })
        .catch(error => {
            console.error('Erreur de chargement :', error);
        });

        
}

        // Optionnel : refermer si clic en dehors
        




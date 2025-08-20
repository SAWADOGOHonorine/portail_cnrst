document.addEventListener('DOMContentLoaded', function () {
    //  Sélecteurs
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');
    const icon = document.querySelector('.rotate-icon');
    const submenu = document.getElementById('submenuDoc');
    const adminLogo = document.getElementById('adminLogo');
    const adminDropdown = document.getElementById('adminDropdown');

    //  Rotation de l’icône si sous-menu présent
    if (submenu && icon) {
        submenu.addEventListener('shown.bs.collapse', () => icon.classList.add('rotated'));
        submenu.addEventListener('hidden.bs.collapse', () => icon.classList.remove('rotated'));
    }

    //  Dropdown admin en haut à droite
    if (adminLogo && adminDropdown) {
        adminLogo.addEventListener('click', function (e) {
            e.stopPropagation(); // Empêche la fermeture immédiate
            adminDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!adminLogo.contains(e.target) && !adminDropdown.contains(e.target)) {
                adminDropdown.classList.add('hidden');
            }
        });
    }

    //  Bouton ☰ pour replier/ouvrir la sidebar
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
});


function loadContent(page) {
    fetch('/' + page) 
        .then(response => response.text())
        .then(html => {
            document.getElementById('content-area').innerHTML = html;
        })
        .catch(error => {
            console.error('Erreur de chargement:', error);
        });
}

   
        // Optionnel : refermer si clic en dehors
        




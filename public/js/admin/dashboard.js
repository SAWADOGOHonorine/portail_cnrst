document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.getElementById('wrapper');
    const sidebar = document.getElementById('sidebar-wrapper');
    const overlay = document.getElementById('overlay');
    const toggleButton = document.getElementById('menu-toggle');

    // ===== TOGGLE SIDEBAR =====
    toggleButton.addEventListener('click', function(e) {
        e.preventDefault();
        wrapper.classList.toggle('toggled');
        overlay.classList.toggle('show');
    });

    // ===== CLOSE SIDEBAR ON OVERLAY CLICK =====
    overlay.addEventListener('click', function() {
        wrapper.classList.remove('toggled');
        overlay.classList.remove('show');
    });

    // ===== RESPONSIVE WINDOW RESIZE =====
    window.addEventListener('resize', function() {
        if(window.innerWidth > 960) {
            // En grand écran, sidebar visible et overlay caché
            wrapper.classList.remove('toggled');
            overlay.classList.remove('show');
        }
    });

    // ===== REDUCED SIDEBAR =====
    const reduceButton = document.createElement('button');
    reduceButton.innerHTML = '⇔';
    reduceButton.classList.add('btn', 'btn-sm', 'btn-secondary', 'mb-3');
    reduceButton.style.width = '3rem';
    reduceButton.title = 'Réduire la sidebar';
    sidebar.prepend(reduceButton);

    reduceButton.addEventListener('click', function() {
        wrapper.classList.toggle('reduced');
    });
});

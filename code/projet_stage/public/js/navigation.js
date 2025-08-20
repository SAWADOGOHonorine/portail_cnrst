document.addEventListener('DOMContentLoaded', function () {
    console.log("Navigation chargée");

    // Bouton Connexion
    const loginBtn = document.querySelector('.login-button');
    if (loginBtn) {
        loginBtn.addEventListener('click', function () {
            console.log("Bouton connexion cliqué");
        });
    }

    // Fonction toggle du menu
    function toggleMenu(icon) {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
        icon.classList.toggle('active'); // animation burger
    }

    // Gestion du menu burger responsive
function toggleMenu(icon) {
  const navLinks = document.querySelector('.nav-links');
  navLinks.classList.toggle('active');

  // Animation du burger (optionnelle)
  icon.classList.toggle('open');
}

// Animation du header au scroll
window.addEventListener('scroll', () => {
  const topBar = document.querySelector('.top-bar');
  if (window.scrollY > 50) {
    topBar.style.padding = '8px 30px';
    topBar.style.fontSize = '0.9rem';
  } else {
    topBar.style.padding = '15px 30px';
    topBar.style.fontSize = '1rem';
  }
});

});


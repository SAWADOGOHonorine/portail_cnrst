// document.addEventListener('DOMContentLoaded', function () {
//     console.log("Navigation chargée");

//     // Bouton Connexion
//     const loginBtn = document.querySelector('.login-button');
//     if (loginBtn) {
//         loginBtn.addEventListener('click', function () {
//             console.log("Bouton connexion cliqué");
//         });
//     }

//     // Fonction toggle du menu (burger)
//     window.toggleMenu = function (icon) {
//         const navLinks = document.querySelector('.nav-links');
//         navLinks.classList.toggle('active');

//         // Animation du burger
//         icon.classList.toggle('open');
//     };

//     // Animation du header au scroll
//     const topBar = document.querySelector('.top-bar');
//     if (topBar) {
//         window.addEventListener('scroll', () => {
//             if (window.scrollY > 50) {
//                 topBar.style.padding = '8px 30px';
//                 topBar.style.fontSize = '0.9rem';
//             } else {
//                 topBar.style.padding = '15px 30px';
//                 topBar.style.fontSize = '1rem';
//             }
//         });
//     }

//     const hamburger = document.getElementById('hamburger');
//     const navItems = document.getElementById('navItems');

//     hamburger.addEventListener('click', () => {
//       navItems.classList.toggle('show');
//   });
// });


    document.addEventListener('DOMContentLoaded', function () {
    const branding = document.getElementById('brandingBloc');
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');

    if (navToggle && navMenu) {
        // Toggle menu mobile
        navToggle.addEventListener('click', function () {
            navMenu.classList.toggle('show');
        });
    }

    // Hide branding on scroll
    let lastScrollTop = 0;
    window.addEventListener('scroll', function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            branding.classList.add('hidden');
        } else {
            branding.classList.remove('hidden');
        }
        lastScrollTop = scrollTop;
    });
});

    
    console.log("Navigation JS chargé !");





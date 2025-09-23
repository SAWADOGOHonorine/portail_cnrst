

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

  function toggleSearchForm() {
    const form = document.getElementById('searchForm');
    if (form.style.display === 'flex') {
      form.style.display = 'none';
    } else {
      form.style.display = 'flex';
    }
  }
    
    console.log("Navigation JS chargé !");





document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll('.slide');
  let current = 0;
  const interval = 3000; // 3 secondes

  function showSlide(index) {
    slides.forEach(slide => slide.classList.remove('active'));
    slides[index].classList.add('active');
  }

  function nextSlide() {
    current = (current + 1) % slides.length;
    showSlide(current);
  }

  // Initialisation
  showSlide(current);

  // Slide automatique
  setInterval(nextSlide, interval);
});


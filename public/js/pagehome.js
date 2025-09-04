
    
  document.addEventListener("DOMContentLoaded", function () {
    let index = 0;
    const slides = document.querySelectorAll('.carrousel-slide');

    setInterval(() => {
      slides[index].classList.remove('active');
      index = (index + 1) % slides.length;
      slides[index].classList.add('active');
    }, 6000); // toutes les 6 secondes
  });



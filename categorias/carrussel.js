let slideIndex = 0;
const slides = document.querySelector('.slides');
const totalSlides = document.querySelectorAll('.slide').length;

// Función para actualizar la posición del carrusel
function updateSlide() {
    slides.style.transform = `translateX(-${slideIndex * 100}%)`;
}

let autoScroll = setInterval(() => {
    slideIndex = (slideIndex + 1) % totalSlides;
    updateSlide();
}, 5000);

const carousel = document.querySelector('.carousel');
carousel.addEventListener('mouseover', () => clearInterval(autoScroll));
carousel.addEventListener('mouseout', () => {
    autoScroll = setInterval(() => {
        slideIndex = (slideIndex + 1) % totalSlides;
        updateSlide();
    }, 5000);
});

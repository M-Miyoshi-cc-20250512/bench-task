const track = document.querySelector('.slider-track');
const slides = document.querySelectorAll('.slide');
const nextBtn = document.querySelector('.next');
const prevBtn = document.querySelector('.prev');

let index = 0;

function showSlide() {
    const slideWidth = slides[0].offsetWidth + 20; 
    track.style.transform = `translateX(${-index * slideWidth}px)`;
}

nextBtn.addEventListener('click', () => {
    if (index < slides.length - 1) {
        index++;
        showSlide();
    }
});

prevBtn.addEventListener('click', () => {
    if (index > 0) {
        index--;
        showSlide();
    }
});
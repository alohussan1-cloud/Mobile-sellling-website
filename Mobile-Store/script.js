// ========================
// HERO SLIDER (slide left/right)
// ========================

var currentSlide = 0;
var slides = document.querySelectorAll('.slide');
var dots = document.querySelectorAll('.dot');
var autoSlideTimer;

function showSlide(index) {
  if (index >= slides.length) { index = 0; }
  if (index < 0) { index = slides.length - 1; }
  currentSlide = index;

  // Move the slider track
  var track = document.querySelector('.slider-track');
  track.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';

  // Update dots
  dots.forEach(function(dot) { dot.classList.remove('active'); });
  dots[currentSlide].classList.add('active');
}

function changeSlide(direction) {
  showSlide(currentSlide + direction);
  resetAutoSlide();
}

function goToSlide(index) {
  showSlide(index);
  resetAutoSlide();
}

function startAutoSlide() {
  autoSlideTimer = setInterval(function() {
    showSlide(currentSlide + 1);
  }, 4000);
}

function resetAutoSlide() {
  clearInterval(autoSlideTimer);
  startAutoSlide();
}

startAutoSlide();

const menuBtn = document.querySelector('.menu-toggle');
const mobileMenu = document.querySelector('.mobile-menu');

menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('active');
});





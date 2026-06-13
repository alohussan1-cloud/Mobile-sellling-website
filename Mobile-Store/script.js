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


// ========================
// CART COUNT
// ========================

function updateCartCount() {
  var cart = JSON.parse(localStorage.getItem('cart')) || [];
  var countEl = document.querySelector('.cart-count');
  if (countEl) {
    countEl.textContent = cart.length;
  }
}

updateCartCount();


// ========================
// ADD TO CART
// ========================

var addToCartButtons = document.querySelectorAll('.btn-small');

addToCartButtons.forEach(function(button) {
  button.addEventListener('click', function() {
    var card = button.closest('.product-card');
    var name = card.querySelector('.product-name').textContent;
    var price = card.querySelector('.product-price').textContent;
    var img = card.querySelector('img').src;

    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push({ name: name, price: price, img: img });
    localStorage.setItem('cart', JSON.stringify(cart));

    updateCartCount();
    alert(name + ' added to cart!');
  });
});
// HERO SLIDER (slide left/right)
let current = 0
let track = document.querySelector(".slider-track")
let slides = document.querySelectorAll(".slide");
let dots = document.querySelectorAll('.dot')

function updateSlide(){
  track.style.transform = `translateX(-${current*100}%)`

  dots.forEach((dot)=>{
  dot.classList.remove('active')
  })
  dots[current].classList.add('active')
}

function prevBtn(){
  current--
  if(current <slides.length){
    current = 2
  }
  updateSlide()
}

function nextBtn(){
  current++
  if(current == slides.length){
    current = 0
  }
  updateSlide()
}

function goToSlide(index){
      current = index
      updateSlide()
}

setInterval(nextBtn,5000)


// Menu toggle for smaller screens
const menuBtn = document.querySelector('.menu-toggle');
const mobileMenu = document.querySelector('.mobile-menu');

menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('active');
});








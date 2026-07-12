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
 s
  
  if(current < 0){
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


// Live Search

let search = document.getElementById("search")
let searchResults = document.getElementById("searchResults")

search.addEventListener("input", ()=>{
      searchMobile()
})

async function searchMobile() {
  let keyword = search.value

  const response = await fetch("search.php?keyword=" + keyword)
  console.log(response);
  
  const data = await response.json()
  console.log(data);

  searchResults.innerHTML = ""
  data.forEach((phone)=>{
    searchResults.innerHTML += `<p class="search-item"> ${phone.Model} </p> `

  })
  
  
}







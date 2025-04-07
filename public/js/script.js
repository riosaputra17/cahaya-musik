// Sliders Otomoatis
let currentSlide = 1;
const totalSlides = 4;
const intervalTime = 7000;

const slides = document.querySelector(".slides");
const dots = document.querySelectorAll(".nav-dot");

// Update active navigation dots
function updateDots() {
  dots.forEach((dot) => dot.classList.remove("active"));
  dots[currentSlide - 1].classList.add("active");
}

// Change slide function
function showSlide(slideIndex) {
  if (slideIndex < 1) {
    currentSlide = totalSlides;
  } else if (slideIndex > totalSlides) {
    currentSlide = 1;
  } else {
    currentSlide = slideIndex;
  }

  slides.style.transform = `translateX(-${(currentSlide - 1) * 100}%)`;
  updateDots();
}

// Add event listeners for next and previous buttons
document.getElementById("next-slide").addEventListener("click", () => {
  showSlide(currentSlide + 1);
});

document.getElementById("prev-slide").addEventListener("click", () => {
  showSlide(currentSlide - 1);
});

// Add event listeners for navigation dots
dots.forEach((dot) => {
  dot.addEventListener("click", (e) => {
    const slideNumber = parseInt(e.target.getAttribute("data-slide"));
    showSlide(slideNumber);
  });
});

// Auto slide
setInterval(() => {
  showSlide(currentSlide + 1);
}, intervalTime);

// PriceList
var $cont = document.querySelector(".cont");
var $elsArr = [].slice.call(document.querySelectorAll(".el"));
var $closeBtnsArr = [].slice.call(document.querySelectorAll(".el__close-btn"));

setTimeout(function () {
  $cont.classList.remove("s--inactive");
}, 200);

$elsArr.forEach(function ($el) {
  $el.addEventListener("click", function () {
    if (this.classList.contains("s--active")) return;
    $cont.classList.add("s--el-active");
    this.classList.add("s--active");
  });
});

$closeBtnsArr.forEach(function ($btn) {
  $btn.addEventListener("click", function (e) {
    e.stopPropagation();
    $cont.classList.remove("s--el-active");
    document.querySelector(".el.s--active").classList.remove("s--active");
  });
});

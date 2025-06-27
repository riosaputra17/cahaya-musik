// Sliders Otomoatis
const scrollContainer = document.getElementById("scrollContainer");
const sections = document.querySelectorAll(".section");
const totalSlides = sections.length;
let currentSlide = 0;
let autoSlideInterval;

function showSlide(index) {
    // Loop kembali ke awal jika index lebih besar dari jumlah slide
    if (index >= totalSlides) index = 0;
    if (index < 0) index = totalSlides - 1;

    scrollContainer.style.transform = `translateX(-${index * 100}vw)`;
    currentSlide = index;
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

// Button handlers
document.getElementById("next-slide").addEventListener("click", () => {
    nextSlide();
    resetAutoSlide();
});

document.getElementById("prev-slide").addEventListener("click", () => {
    prevSlide();
    resetAutoSlide();
});

// Auto slide function
function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
        nextSlide();
    }, 7000); // 5000ms = 5 detik
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
}

// Mulai auto slide saat halaman dimuat
startAutoSlide();

const navDots = document.querySelectorAll(".nav-dot");

function updateNavDots(index) {
    navDots.forEach((dot) => dot.classList.remove("active"));
    if (navDots[index]) {
        navDots[index].classList.add("active");
    }
}

// Tambahkan updateNavDots di fungsi showSlide
function showSlide(index) {
    if (index >= totalSlides) index = 0;
    if (index < 0) index = totalSlides - 1;

    scrollContainer.style.transform = `translateX(-${index * 100}vw)`;
    currentSlide = index;
    updateNavDots(index);
}

// Navigasi klik manual
navDots.forEach((dot, idx) => {
    dot.addEventListener("click", (e) => {
        e.preventDefault();
        showSlide(idx);
        resetAutoSlide();
    });
});

// Humberger Menu
const hamburger = document.getElementById("hamburger-menu");
const sidebar = document.getElementById("mobile-sidebar");
const closeBtn = document.querySelector(".close-btn");

hamburger.addEventListener("click", function (e) {
    e.preventDefault();
    sidebar.style.left = "0";
});

closeBtn.addEventListener("click", function (e) {
    e.preventDefault();
    sidebar.style.left = "-100%";
});

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

// whatsaap massege
function sendToWhatsApp() {
    const nama = document.getElementById("nama").value;
    const email = document.getElementById("email").value;
    const nohp = document.getElementById("nohp").value;

    const pesan = `Halo, saya ${nama}, email: ${email}, no HP: ${nohp}. Saya ingin menanyakan informasi Cahaya Musik Cibitung.`;
    const encodedMessage = encodeURIComponent(pesan);
    const nomorTujuan = "6285752181103"; // Ganti dengan nomor WhatsApp Anda

    window.open(
        `https://wa.me/${nomorTujuan}?text=${encodedMessage}`,
        "_blank"
    );
}

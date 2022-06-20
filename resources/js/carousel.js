const slides = document.querySelectorAll("img[carousel-image]");

slides?.forEach((slide, idx) => {
    slide.style.transform = `translateX(${idx * 100}%)`;
});

let curSlide = 0;

// select next slide button
const nextSlide = document.querySelector("#carousel-next-btn");
const prevSlide = document.querySelector("#carousel-prev-btn");

nextSlide?.addEventListener("click", () => changeImage(1));
prevSlide?.addEventListener("click", () => changeImage(-1));

function changeImage(n) {
    curSlide =
        curSlide + n < 0 ? slides.length - 1 : (curSlide + n) % slides.length;

    slides.forEach((slide, idx) => {
        slide.style.transform = `translateX(${100 * (idx - curSlide)}%)`;
    });
}

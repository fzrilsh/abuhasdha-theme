const track = document.getElementById("carousel-track");
const slides = document.querySelectorAll("#carousel-track > div > div");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");
const dotsContainer = document.getElementById("carousel-dots");

if (slides.length > 0) {
    const slideWidth = slides[0].offsetWidth;
    let currentSlide = 0;

    slides.forEach((_, i) => {
        const dot = document.createElement("button");
        dot.className = "w-3 h-3 rounded-full transition-all duration-300";
        if (i === 0) dot.classList.add("bg-dark-orange");
        else dot.classList.add("bg-gray-300");
        dot.addEventListener("click", () => goToSlide(i));
        dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.querySelectorAll("button");
    function goToSlide(index) {
        const offset = slideWidth * index;
        track.scrollTo({ left: offset, behavior: "smooth" });
        currentSlide = index;
        updateDots();
    }

    function updateDots() {
        dots.forEach((dot, i) => {
            dot.classList.toggle("bg-dark-orange", i === currentSlide);
            dot.classList.toggle("bg-gray-300", i !== currentSlide);
        });
    }

    nextBtn.addEventListener("click", () => {
        currentSlide = (currentSlide + 1) % slides.length;
        goToSlide(currentSlide);
    });

    prevBtn.addEventListener("click", () => {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        goToSlide(currentSlide);
    });

    track.addEventListener("scroll", () => {
        const index = Math.round(track.scrollLeft / slideWidth);
        if (index !== currentSlide) {
            currentSlide = index;
            updateDots();
        }
    });
}
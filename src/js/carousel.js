document.addEventListener("DOMContentLoaded", () => {
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
            
            if (i === 0) dot.classList.add("bg-orange");
            else dot.classList.add("bg-gray-300");

            dot.addEventListener("click", () => goTo(i));
            dotsContainer.appendChild(dot);
        });

        const dots = dotsContainer.querySelectorAll("button");
        function goTo(i) {
            currentSlide = (currentSlide + slides.length) % slides.length;

            track.scrollTo({
                left: slideWidth * (i + slides.length % slides.length),
                behavior: 'smooth'
            });

            updateDots()
        }

        function updateDots() {
            dots.forEach((dot, i) => {
                dot.classList.toggle("bg-orange", i === currentSlide);
                dot.classList.toggle("bg-gray-300", i !== currentSlide);
            });
        }

        nextBtn?.addEventListener("click", () => goTo(currentSlide + 1));
        prevBtn?.addEventListener("click", () => goTo(currentSlide - 1));

        track.addEventListener("scroll", () => {
            const index = Math.round(track.scrollLeft / slideWidth);
            if (index !== currentSlide) {
                currentSlide = index;
                updateDots();
            }
        });
    };
});


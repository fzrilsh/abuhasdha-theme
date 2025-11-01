document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileBar = document.getElementById('mobilebar');

    if (mobileMenuButton && mobileBar) {
        mobileMenuButton.addEventListener('click', () => {
            mobileBar.classList.toggle('hidden');
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");
            if (targetId.length > 1) {
                e.preventDefault();
                const target = document.querySelector(targetId);
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 40,
                        behavior: "smooth"
                    });
                }
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll('nav a[href^="#"]');
    const currentHash = window.location.hash;

    links.forEach(link => {
        const href = link.getAttribute("href");
        if (href === currentHash) {
            link.classList.remove("bg-orange");
            link.classList.add("bg-dark-orange");
        } else {
            link.classList.remove("bg-dark-orange");
            link.classList.add("bg-orange");
        }
    });

    // Update kalau hash berubah
    window.addEventListener("hashchange", function () {
        const newHash = window.location.hash;
        links.forEach(link => {
            const href = link.getAttribute("href");
            if (href === newHash) {
                link.classList.remove("bg-orange");
                link.classList.add("bg-dark-orange");
            } else {
                link.classList.remove("bg-dark-orange");
                link.classList.add("bg-orange");
            }
        });
    });
});

// Carousel
const track = document.getElementById("carousel-track");
const slides = document.querySelectorAll("#carousel-track > div");
const slideWidth = slides[0].offsetWidth;
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");

nextBtn.addEventListener("click", () => {
    track.scrollBy({ left: slideWidth, behavior: "smooth" });
});

prevBtn.addEventListener("click", () => {
    track.scrollBy({ left: -slideWidth, behavior: "smooth" });
});
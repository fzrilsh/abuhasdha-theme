document.addEventListener("DOMContentLoaded", () => {
    const gallery = document.getElementById('horizontal-gallery');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const dotsContainer = document.getElementById('carousel-dots');

    if (gallery) {
        const topRow = gallery.querySelectorAll('.flex-row:first-child figure');
        const anchors = Array.from(topRow);
        let current = 0;

        anchors.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.className = 'w-3 h-3 rounded-full transition-all duration-300 ' + (i === 0 ? 'bg-orange' : 'bg-gray-300');
            dot.addEventListener('click', () => scrollToIndex(i));
            dotsContainer.appendChild(dot);
        });
        const dots = dotsContainer.querySelectorAll('button');

        function updateDots() {
            dots.forEach((d, i) => {
                d.classList.toggle('bg-orange', i === current);
                d.classList.toggle('bg-gray-300', i !== current);
            });
        }

        function scrollToIndex(i) {
            if (i < 0 || i >= anchors.length) return;
            current = i;
            const fig = anchors[i];
            const center = fig.offsetLeft + fig.offsetWidth / 2;
            gallery.scrollTo({
                left: center - gallery.clientWidth / 2,
                behavior: 'smooth'
            });
            updateDots();
            updateButtons();
        }

        nextBtn?.addEventListener('click', () => scrollToIndex(current + 1));
        prevBtn?.addEventListener('click', () => scrollToIndex(current - 1));

        function updateButtons() {
            if (!nextBtn || !prevBtn) return;
            const maxScroll = gallery.scrollWidth - gallery.clientWidth;
            const atStart = gallery.scrollLeft <= 2;
            const atEnd = gallery.scrollLeft >= maxScroll - 2;
            prevBtn.classList.toggle('opacity-0', atStart);
            prevBtn.classList.toggle('pointer-events-none', atStart);
            nextBtn.classList.toggle('opacity-0', atEnd);
            nextBtn.classList.toggle('pointer-events-none', atEnd);
        }

        // Helpers for edges
        const isAtStart = () => gallery.scrollLeft <= 2;
        const isAtEnd = () => gallery.scrollLeft >= (gallery.scrollWidth - gallery.clientWidth - 2);

        let ticking = false;
        gallery.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    if (isAtStart()) {
                        current = 0;
                        updateDots();
                    } else if (isAtEnd()) {
                        current = anchors.length - 1;
                        updateDots();
                    } else {
                        const galleryCenter = gallery.scrollLeft + gallery.clientWidth / 2;
                        let closestIndex = current;
                        let minDelta = Infinity;
                        anchors.forEach((fig, i) => {
                            const rect = fig.getBoundingClientRect();
                            const gRect = gallery.getBoundingClientRect();
                            const figCenter = (rect.left - gRect.left) + gallery.scrollLeft + rect.width / 2;
                            const delta = Math.abs(figCenter - galleryCenter);
                            if (delta < minDelta) { minDelta = delta; closestIndex = i; }
                        });
                        if (closestIndex !== current) {
                            current = closestIndex;
                            updateDots();
                        }
                    }
                    updateButtons();
                    ticking = false;
                });
                ticking = true;
            }
        });

        updateButtons();
    }
});


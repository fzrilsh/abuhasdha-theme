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
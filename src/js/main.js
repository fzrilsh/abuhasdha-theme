document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileBar = document.getElementById('mobilebar');

    if (mobileMenuButton && mobileBar) {
        mobileMenuButton.addEventListener('click', () => {
            mobileBar.classList.toggle('hidden');
        });
    }
});
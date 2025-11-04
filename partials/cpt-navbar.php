<nav class="w-full flex justify-between items-center fixed top-0 z-50 bg-white shadow-lg">
    <div class="container mx-auto flex justify-between items-center relative">
        <a href="<?= esc_url(home_url('/')); ?>" class="md:px-8 px-4 py-2">
            <img src="<?= get_theme_mod('custom_logo') ? wp_get_attachment_url(get_theme_mod('custom_logo'), 'full') : get_stylesheet_directory_uri() . '/assets/logo.png' ?>" alt="Logo">
        </a>

        <a href="<?= esc_url(home_url(get_query_var('size') ? '/products' : '/')) ?>" class="h-full px-8 md:px-12 font-bold text-orange flex flex-row items-center justify-center gap-3">
            <i class="fa-solid fa-chevron-left"></i>
            <p class="hidden md:flex"><?= get_query_var('size') ? 'Daftar Produk' : 'Kembali ke Beranda' ?></p>
        </a>
    </div>
</nav>
<nav class="w-full flex justify-between items-center fixed top-0 z-50 bg-white shadow-lg">
    <div class="container mx-auto flex justify-between relative">
        <a href="<?= esc_url(home_url('/')); ?>" class="md:px-8 px-4 py-2">
            <img src="<?= get_theme_mod('custom_logo') ? wp_get_attachment_url(get_theme_mod('custom_logo'), 'full') : get_stylesheet_directory_uri() . '/assets/logo.png' ?>" alt="Logo">
        </a>
        <div class="md:px-8 px-4 md:hidden p-4 flex justify-center items-center">
            <button id="mobile-menu-button">
                <i class="text-lg fa-solid fa-bars"></i>
            </button>
        </div>

        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary_menu',
            'container' => 'ul',
            'menu_class' => 'md:flex w-fit hidden h-full',
        ));
        ?>
    </div>

    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary_menu',
        'container' => 'ul',
        'menu_class' => 'hidden md:hidden absolute top-[100%] bg-white w-full text-white shadow-lg',
        'menu_id' => 'mobilebar'
    ));
    ?>
</nav>
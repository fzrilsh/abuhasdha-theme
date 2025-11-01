<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('flex flex-col justify-center items-center font-plus-jakarta-sans'); ?>>
    <?php wp_body_open(); ?>
    <nav class="w-full flex justify-between items-center fixed top-0 z-50">
        <div class="w-full flex justify-between relative bg-white">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="md:px-8 px-4 py-4">
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
                'menu_class' => 'md:flex flex-5 hidden h-full',
            ));
            ?>
        </div>

        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary_menu',
            'container' => 'ul',
            'menu_class' => 'hidden md:hidden absolute top-[69px] bg-orange w-full text-white',
            'menu_id' => 'mobilebar'
        ));
        ?>
    </nav>
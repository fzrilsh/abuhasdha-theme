<?php

// load css
function load_scripts()
{
    wp_enqueue_style('abuhasdha-main-style', get_stylesheet_uri());

    // Google Fonts
    wp_enqueue_style('google-fonts-preconnect-1', 'https://fonts.googleapis.com', [], null);
    // wp_enqueue_style('google-fonts-preconnect-2', 'https://fonts.gstatic.com', [], null, array('crossorigin' => 'anonymous'));
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap', [], null);

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css', [], '7.0.1');

    // Enqueue main js script
    wp_enqueue_script('main-js', get_template_directory_uri() . '/src/js/main.js', [], null, true); // true = muat di footer

    // Enqueue carousel
    wp_enqueue_script('carousel-js', get_template_directory_uri() . '/src/js/carousel.js', [], null, true);

    // register tailwind style
    wp_enqueue_style(
        'tailwind-styles',
        get_template_directory_uri() . '/src/output.css',
        [],
        filemtime(get_template_directory() . '/src/output.css'),
        'all'
    );
}
add_action('wp_enqueue_scripts', 'load_scripts');

function theme_customizer_gallery(){
    wp_enqueue_media();
    wp_enqueue_script('theme-customizer-gallery', get_template_directory_uri() . '/src/js/customizer-gallery.js', ['jquery'], false, true);
}
add_action('customize_controls_enqueue_scripts', 'theme_customizer_gallery');

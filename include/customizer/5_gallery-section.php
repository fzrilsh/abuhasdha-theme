<?php

const GALLERY = 'gallery_section';
function register_gallery_section($wp_customize) 
{
    $wp_customize->add_section(GALLERY, [
        'title'    => __('Gallery Section', 'abuhasdha'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('custom_gallery_images', [
        'default'   => '',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control('custom_gallery_images_control', [
        'label'    => __('Upload Gallery Images', 'abuhasdha'),
        'section'  => GALLERY,
        'settings' => 'custom_gallery_images',
        'type'     => 'text',
    ]);

    // remove unnecessary section
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'register_gallery_section');
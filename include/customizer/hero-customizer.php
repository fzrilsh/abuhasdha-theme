<?php 

const HERO = 'hero_section';
function register_hero_section($wp_customize)
{
    $wp_customize->add_section(HERO, array(
        'title'      => __('Hero Section', 'abuhasdha'),
        'priority'   => 30,
    ));

    // background
    $wp_customize->add_setting('hero_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image_control', array(
        'label'      => __('Background', 'abuhasdha'),
        'section'    => HERO,
        'settings'   => 'hero_image',
    )));

    // Title
    $wp_customize->add_setting('hero_heading', array(
        'default' => 'Tyres You Can Rely On. Solusi Ban Alat Berat dan Industri Anda!',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_heading_control', array(
        'label'      => __('Title', 'abuhasdha'),
        'section'    => HERO,
        'settings'   => 'hero_heading',
        'type'       => 'text',
    ));

    // Description
    $wp_customize->add_setting('hero_description', array(
        'default' => 'Dengan pengalaman lebih dari 40 tahun, Abuhasdha menyediakan ban Off-The-Road (OTR), truk, bus, dan industri yang tangguh, berkualitas, dan didukung layanan teknis menyeluruh.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description_control', array(
        'label'      => __('Description', 'abuhasdha'),
        'section'    => HERO,
        'settings'   => 'hero_description',
        'type'       => 'textarea',
    ));

    // See Product button
    $wp_customize->add_setting('see_product_button', array(
        'default' => 'Lihat Produk',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('see_product_button_control', array(
        'label'      => __('Lihat Produk Teks', 'abuhasdha'),
        'section'    => HERO,
        'settings'   => 'see_product_button',
        'type'       => 'text',
    ));

    // Contact Us button
    $wp_customize->add_setting('contact_us_button', array(
        'default' => 'Hubungi Kami',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_us_button_control', array(
        'label'      => __('Hubungi Kami Teks', 'abuhasdha'),
        'section'    => HERO,
        'settings'   => 'contact_us_button',
        'type'       => 'text',
    ));

    // remove unnecessary section
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'register_hero_section');

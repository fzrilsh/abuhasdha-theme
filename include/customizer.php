<?php 

// register customizer theme
function customize_register($wp_customize)
{
    $wp_customize->add_section('hero_section', array(
        'title'      => __('Hero Section', 'abuhasdha'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('hero_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image_control', array(
        'label'      => __('Hero Image', 'abuhasdha'),
        'section'    => 'hero_section',
        'settings'   => 'hero_image',
    )));

    $wp_customize->add_setting('hero_heading', array('default' => 'Solusi Ban Alat Berat dan Industri Anda'));
    $wp_customize->add_control('hero_heading_control', array(
        'label'      => __('Judul Hero', 'abuhasdha'),
        'section'    => 'hero_section',
        'settings'   => 'hero_heading',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('hero_description', array('default' => 'Dengan pengalaman lebih dari 40 tahun, Abuhasdha menyediakan ban Off-The-Road (OTR), truk, bus, dan industri yang tangguh, berkualitas, dan didukung layanan teknis menyeluruh.'));
    $wp_customize->add_control('hero_description_control', array(
        'label'      => __('Deskripsi Hero', 'abuhasdha'),
        'section'    => 'hero_section',
        'settings'   => 'hero_description',
        'type'       => 'textarea',
    ));

    $wp_customize->add_setting('hero_button_text', array('default' => 'Lihat Produk'));
    $wp_customize->add_control('hero_button_text_control', array(
        'label'      => __('Teks Tombol', 'abuhasdha'),
        'section'    => 'hero_section',
        'settings'   => 'hero_button_text',
        'type'       => 'text',
    ));

    // remove unnecessary section
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'customize_register');

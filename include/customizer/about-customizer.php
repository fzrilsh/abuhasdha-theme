<?php

const ABOUT = 'about_section';
function register_about_section($wp_customize)
{
    $wp_customize->add_section(ABOUT, array(
        'title'      => __('About Section', 'abuhasdha'),
        'priority'   => 30,
    ));

    // background
    $wp_customize->add_setting('about_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image_control', array(
        'label'      => __('Image', 'abuhasdha'),
        'section'    => ABOUT,
        'settings'   => 'about_image',
    )));

    // Description
    $wp_customize->add_setting('about_description', array(
        'default'           => "PT. Abuhasdha didirikan pada tahun 1980 oleh Mr. Halim Soeganha, dan sejak itu menjadi salah satu penyedia ban OTR, truk, dan industri terkemuka di Indonesia. Dengan pengalaman lebih dari empat dekade, kami tidak hanya menawarkan produk berkualitas, tetapi juga menjadi mitra strategis bagi berbagai sektor industri.\n\nKami adalah distributor resmi Tianli Tyres (TUTRIC, China), produsen ban kelas dunia dengan lebih dari 300 ukuran, diekspor ke lebih dari 70 negara, dan didukung oleh riset serta standar internasional (ISO, REACH).\n\nKami percaya bahwa ban bukan sekadar komponen kendaraan, melainkan faktor penting dalam mendukung produktivitas, keamanan, dan keberlanjutan bisnis Anda.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_description_control', array(
        'label'      => __('Description', 'abuhasdha'),
        'section'    => ABOUT,
        'settings'   => 'about_description',
        'type'       => 'textarea',
    ));

    // remove unnecessary section
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'register_about_section');

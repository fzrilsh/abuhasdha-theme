<?php

const FOOTER = 'footer_section';
function register_footer_section($wp_customize)
{
    $wp_customize->add_section(FOOTER, array(
        'title'      => __('Footer Section', 'abuhasdha'),
        'priority'   => 30,
    ));

    // Email
    $wp_customize->add_setting('footer_email', array(
        'default'           => "abuhasdha80@cbn.net.id",
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('footer_email_control', array(
        'label'      => __('Email', 'abuhasdha'),
        'section'    => FOOTER,
        'settings'   => 'footer_email',
        'type'       => 'text',
    ));

    // Telephone
    $wp_customize->add_setting('footer_phone', array(
        'default'           => "(021) 63863210\n(021) 63863012",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_phone_control', array(
        'label'       => __('Phone Number', 'abuhasdha'),
        'section'     => FOOTER,
        'settings'    => 'footer_phone',
        'type'        => 'textarea',
        'description' => __('Separate phone number with new line.', 'abuhasdha')
    ));

    // Address
    $wp_customize->add_setting('footer_address', array(
        'default'           => "Jl. Kyai Caringin No.14B, Jakarta, 10150, DKI Jakarta, Indonesia",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_address_control', array(
        'label'       => __('Addresses', 'abuhasdha'),
        'section'     => FOOTER,
        'settings'    => 'footer_address',
        'type'        => 'textarea',
        'description' => __('Separate address with new line.', 'abuhasdha')
    ));
    
    // Address URL
    $wp_customize->add_setting('footer_address_url', array(
        'default'           => "https://share.google/Yr2nBExkCfqfErbXY",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_address_url_control', array(
        'label'       => __('Google Maps Addresses URL', 'abuhasdha'),
        'section'     => FOOTER,
        'settings'    => 'footer_address_url',
        'type'        => 'textarea',
         'description' => __('Separate address url with new line.', 'abuhasdha')
    ));

    // remove unnecessary section
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'register_footer_section');

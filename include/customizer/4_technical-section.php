<?php

const TECHNICAL = 'technical_section';
function register_technical_section($wp_customize)
{
    $wp_customize->add_section(TECHNICAL, array(
        'title'      => __('Technical Section', 'abuhasdha'),
        'priority'   => 30,
    ));

    // Label
    $wp_customize->add_setting('technical_label', array(
        'default'           => "Kami memahami bahwa kebutuhan ban bukan hanya pembelian, tapi juga perawatan agar mendukung kelancaran operasional. Oleh karena itu, Abuhasdha menghadirkan layanan onsite & konsultasi teknis:",
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('technical_label_control', array(
        'label'       => __('Technical Service Label Text', 'abuhasdha'),
        'section'     => TECHNICAL,
        'settings'    => 'technical_label',
        'type'        => 'text'
    ));

    // Services
    $wp_customize->add_setting('technical_services', array(
        'default'           => "Tire Recommendations & Observations\nHeat Study\nRunning Tire/Pressure Inspections\nScrap Tire Inspections\nTKPH Analysis\nSite Severity Survey\nTire Awareness Training\nNew Product Presentation & Survey",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('technical_services_control', array(
        'label'       => __('Technical Service', 'abuhasdha'),
        'section'     => TECHNICAL,
        'settings'    => 'technical_services',
        'type'        => 'textarea',
        'description' => __('Separate services with new line.', 'abuhasdha')
    ));
    
    // remove unnecessary section
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'register_technical_section');

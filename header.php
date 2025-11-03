<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('flex flex-col justify-center items-center font-plus-jakarta-sans'); ?>>
    <?php wp_body_open(); ?>
    <?php if ( is_front_page() ): 
        require_once get_template_directory() . '/partials/navbar.php'; 
    else:
        require_once get_template_directory() . '/partials/cpt-navbar.php'; 
    endif; ?>
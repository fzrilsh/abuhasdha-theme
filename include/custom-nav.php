<?php

function add_li_classes_to_nav_menu($items, $args)
{
    if ($args->theme_location !== 'primary_menu') {
        return $items;
    }

    $is_mobile = (isset($args->menu_id) && $args->menu_id === 'mobilebar');
    foreach ($items as $item) {
        $item->classes[] = $is_mobile ? 'p-4 border-t' : 'relative';
        $item->classes[] = 'hover:bg-orange';
        $item->classes[] = 'transition-colors';
        $item->classes[] = 'duration-300';
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'add_li_classes_to_nav_menu', 10, 2);

function add_a_classes_to_nav_menu($atts, $item, $args)
{
    if ($args->theme_location !== 'primary_menu') {
        return $atts;
    }

    $is_mobile = (isset($args->menu_id) && $args->menu_id === 'mobilebar');
    $atts['class'] = $is_mobile ? 'block text-orange' : 'md:py-4 w-fit h-full flex justify-center items-center text-orange px-8';
    $atts['class'] .= ' font-semibold hover:text-white transition-colors duration-300';

    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_a_classes_to_nav_menu', 10, 3);

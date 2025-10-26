<?php

function add_li_classes_to_nav_menu($items, $args)
{
    if ($args->theme_location == 'primary_menu') {
        foreach ($items as $item) {
            if (isset($args->menu_id) && $args->menu_id === 'mobilebar') {
                // mobile
                $item->classes[] = 'p-4 border-t border-white';

                if ($item->current) {
                    $item->classes[] = 'bg-dark-orange';
                }
            } else {
                // desktop
                $li_classes = "relative flex-1 after:content-[''] after:absolute after:right-[-1px] after:top-1/2 after:-translate-y-1/2 after:w-[3px] after:h-5 after:bg-white";
                $item->classes = explode(' ', $li_classes);
            }
        }

        end($items)->classes = ['flex-1'];
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'add_li_classes_to_nav_menu', 10, 3);

function add_a_classes_to_nav_menu($atts, $item, $args)
{
    if ($args->theme_location == 'primary_menu') {
        if (isset($args->menu_id) && $args->menu_id === 'mobilebar') {
            // mobile
            $atts['class'] = 'block text-white';
        } else {
            // desktop
            $base_classes = 'md:py-6 w-full text-white h-full flex justify-center items-center';
            $atts['class'] = $item->current
                ? $base_classes . ' bg-dark-orange'
                : $base_classes . ' bg-orange';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_a_classes_to_nav_menu', 10, 3);

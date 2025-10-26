<?php

function add_li_classes_to_nav_menu($classes, $item, $args) {
    if ($args->theme_location == 'primary_menu') {
        $li_classes = "relative flex-1 after:content-[''] after:absolute after:right-[-1px] after:top-1/2 after:-translate-y-1/2 after:w-[3px] after:h-5 after:bg-white";
        
        $classes = array_merge($classes, explode(' ', $li_classes));

        if (in_array('last', $classes)) {
            $classes = array_diff($classes, ["after:content-['']", "after:absolute", "after:right-[-1px]", "after:top-1/2", "after:-translate-y-1/2", "after:w-[3px]", "after:h-5", "after:bg-white"]);
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_li_classes_to_nav_menu', 10, 3);


function add_a_classes_to_nav_menu($atts, $item, $args) {
    if ($args->theme_location == 'primary_menu') {
        $base_classes = 'md:py-6 w-full text-white h-full flex justify-center items-center';
        
        if ($item->current) {
            $atts['class'] = $base_classes . ' bg-dark-orange';
        } else {
            $atts['class'] = $base_classes . ' bg-orange';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_a_classes_to_nav_menu', 10, 3);
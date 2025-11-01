<?php 

get_header(); 

$phone_number = preg_split('/\r\n|\r|\n/', get_theme_mod('footer_phone'), -1, PREG_SPLIT_NO_EMPTY)[0];
set_query_var('phone_number', $phone_number);

get_template_part('partials/home');
get_template_part('partials/about');
get_template_part('partials/services');
get_template_part('partials/gallery');

get_footer();

?>
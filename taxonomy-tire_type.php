<?php

$size = get_query_var('size');
$type = get_query_var('tire_type');
$products = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => -1,
    'tax_query' => [
        [
            'taxonomy' => 'tire_type',
            'field'    => 'slug',
            'terms'    => $type,
        ],
    ],
    'meta_query' => [
        [
            'key'     => 'size',
            'value'   => $size,
            'compare' => '=',
        ]
    ],
]);

if(!$products->have_posts()) {
    wp_safe_redirect(home_url('/products'));
    exit;
}

get_header(); 

set_query_var('products', $products);
require_once get_template_directory() . '/partials/products-by-size.php';

get_footer();

?>
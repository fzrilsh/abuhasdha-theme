<?php

$products = get_transient('products');
if (!$products) {
    $all = new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => -1,
    ]);

    $temp = [];
    if ($all->have_posts()) {
        while ($all->have_posts()) {
            $all->the_post();
            $product_id = get_the_ID();

            $tire_types = get_the_terms($product_id, 'tire_type');
            $brand = strtolower(get_field('brand', $product_id));
            $size = get_field('size', $product_id);

            if (empty($tire_types) || empty($brand) || empty($size)) {
                continue;
            }

            $type = $tire_types[0];
            $temp[$type->slug]['name'] = $type->name;
            $temp[$type->slug]['brands'][$brand][$size] = true;
        }
        wp_reset_postdata();
    }

    $products = [];
    foreach ($temp as $type_slug => $type_data) {
        $brands_array = [];
        if (!empty($type_data['brands'])) {
            foreach ($type_data['brands'] as $brand_name => $sizes) {
                $size_list = array_keys($sizes);
                sort($size_list);
                $brands_array[$brand_name] = $size_list;
            }
        }
        ksort($brands_array);

        $products[$type_slug] = [
            'name' => $type_data['name'],
            'link' => get_term_link($type_slug, 'tire_type'),
            'brands' => $brands_array,
        ];
    }
    ksort($products);

    set_transient('products', $products, HOUR_IN_SECONDS);
}

get_header();

set_query_var('products', $products);
require_once get_template_directory() . '/partials/products.php';

get_footer();

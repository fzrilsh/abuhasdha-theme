<?php

// create custom post type for products
function create_cpt_product()
{
    $labels = array(
        'name'                  => _x('Products', 'Products', 'abuhasdha'),
        'singular_name'         => _x('Product', 'Product', 'abuhasdha'),
        'menu_name'             => __('Products', 'abuhasdha'),
        'archives'              => __('Product Archives', 'abuhasdha'),
        'add_new_item'          => __('Add new Product', 'abuhasdha'),
        'add_new'               => __('Add new', 'abuhasdha'),
        'new_item'              => __('New Product', 'abuhasdha'),
        'edit_item'             => __('Edit Product', 'abuhasdha'),
        'update_item'           => __('Update Product', 'abuhasdha'),
        'view_item'             => __('View Product', 'abuhasdha'),
        'search_items'          => __('Search Product', 'abuhasdha'),
        'not_found'             => __('Product not found', 'abuhasdha'),
        'not_found_in_trash'    => __('Product not found in trash', 'abuhasdha'),
    );
    $args = array(
        'label'                 => __('Products', 'abuhasdha'),
        'description'           => __('Konten untuk product perusahaan', 'abuhasdha'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-cart',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'exclude_from_search'   => false,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'products', 'with_front' => false),
        'show_in_rest'          => false,
        'publicly_queryable'    => true,
        'has_archive'           => true,
    );
    register_post_type('product', $args);
}
add_action('init', 'create_cpt_product', 0);

add_action('init', function () {
    if (post_type_exists('product')) {
        add_rewrite_rule(
            '^products/([^/]+)/([^/]+)/?$',
            'index.php?tire_type=$matches[1]&size=$matches[2]',
            'top'
        );

        add_rewrite_rule(
            '^products/([^/]+)/?$',
            'index.php?tire_type=$matches[1]',
            'top'
        );
    }
});

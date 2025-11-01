<?php

// create custom post type for 'service'
function create_cpt_service()
{
    $labels = array(
        'name'                  => _x('Layanan', 'Layanan', 'abuhasdha'),
        'singular_name'         => _x('Layanan', 'Layanan', 'abuhasdha'),
        'menu_name'             => __('Layanan', 'abuhasdha'),
        'archives'              => __('Arsip Layanan', 'abuhasdha'),
        'add_new_item'          => __('Tambah Layanan Baru', 'abuhasdha'),
        'add_new'               => __('Tambah Baru', 'abuhasdha'),
        'new_item'              => __('Layanan Baru', 'abuhasdha'),
        'edit_item'             => __('Edit Layanan', 'abuhasdha'),
        'update_item'           => __('Perbarui Layanan', 'abuhasdha'),
        'view_item'             => __('Lihat Layanan', 'abuhasdha'),
        'search_items'          => __('Cari Layanan', 'abuhasdha'),
        'not_found'             => __('Tidak ditemukan', 'abuhasdha'),
        'not_found_in_trash'    => __('Tidak ditemukan di Sampah', 'abuhasdha'),
    );
    $args = array(
        'label'                 => __('Layanan', 'abuhasdha'),
        'description'           => __('Konten untuk service perusahaan', 'abuhasdha'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-tools',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'exclude_from_search'   => false,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'service', 'with_front' => false),
        'show_in_rest'          => false,
        'publicly_queryable'    => true,
        'has_archive'           => true,
    );
    register_post_type('service', $args);
}
add_action('init', 'create_cpt_service', 0);

// create custom post type for products
function create_cpt_product()
{
    $labels = array(
        'name'                  => _x('Produk', 'Produk', 'abuhasdha'),
        'singular_name'         => _x('Produk', 'Produk', 'abuhasdha'),
        'menu_name'             => __('Produk', 'abuhasdha'),
        'archives'              => __('Arsip Produk', 'abuhasdha'),
        'add_new_item'          => __('Tambah Produk Baru', 'abuhasdha'),
        'add_new'               => __('Tambah Baru', 'abuhasdha'),
        'new_item'              => __('Produk Baru', 'abuhasdha'),
        'edit_item'             => __('Edit Produk', 'abuhasdha'),
        'update_item'           => __('Perbarui Produk', 'abuhasdha'),
        'view_item'             => __('Lihat Produk', 'abuhasdha'),
        'search_items'          => __('Cari Produk', 'abuhasdha'),
        'not_found'             => __('Tidak ditemukan', 'abuhasdha'),
        'not_found_in_trash'    => __('Tidak ditemukan di Sampah', 'abuhasdha'),
    );
    $args = array(
        'label'                 => __('Produk', 'abuhasdha'),
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
        'rewrite'               => array('slug' => 'product', 'with_front' => false),
        'show_in_rest'          => false,
        'publicly_queryable'    => true,
        'has_archive'           => true,
    );
    register_post_type('product', $args);
}
add_action('init', 'create_cpt_product', 0);

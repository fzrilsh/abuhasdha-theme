<?php

function manage_theme_support()
{
    // register dynamic navigation menu
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'abuhasdha'),
    ));

    // register needed theme support
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'manage_theme_support');

function manage_widget_dashboard()
{
    // add shortcut widget at dashboard
    wp_add_dashboard_widget(
        'widget_shortcut',
        'Activity Shortcut',
        'show_shortcut_widget',
        null,
        null,
        'side',
        'high'
    );

    // remove unnecessery widget at dashboard
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_site_health', 'dashboard', 'side');
    remove_meta_box('aioseo-rss-feed', 'dashboard', 'side');
    remove_action('welcome_panel', 'wp_welcome_panel');
}
add_action('wp_dashboard_setup', 'manage_widget_dashboard');

add_filter('get_the_archive_title_prefix', function ($prefix) {
    return '';
});

add_filter('pre_get_document_title', function ($title_original) {
    if (is_front_page()) {
        return get_bloginfo('name');
    }

    $size = get_query_var('size');
    if (is_archive()) {
        return get_the_archive_title() . ($size ? ' ' . $size : '') . ' List';
    }

    if (is_search()) {
        return sprintf('Search Results for: %s', get_search_query());
    }

    if (is_404()) {
        return 'Page Not Found';
    }

    if (is_singular()) {
        return get_the_title();
    }

    if (get_queried_object()) {
        return get_the_title(get_queried_object_id());
    }

    return $title_original;
}, 9999);

add_filter('query_vars', function($vars) {
    $vars[] = 'size';
    return $vars;
});

add_filter('the_content', function($content) {
    $content = preg_replace(
        '/<ul(.*?)>/',
        '<ul$1 class="list-disc list-outside pl-5 marker:text-orange-500 space-y-1 font-semibold text-sm">',
        $content
    );
    return $content;
});

function show_shortcut_widget()
{
    echo '
    <p>Selamat datang di dashboard website company profile Anda. Gunakan link di bawah ini untuk mengelola konten penting dengan cepat.</p>
    <ul>
        <li>&#9998; <a href="post-new.php?post_type=product"><strong>Tambah Produk Baru</strong></a></li>
        <li>&#9998; <a href="post-new.php?post_type=service"><strong>Tambah Layanan Baru</strong></a></li>
        <br>
        <li>&#128195; <a href="edit.php?post_type=product">Lihat Semua Produk</a></li>
        <li>&#128195; <a href="edit.php?post_type=service">Lihat Semua Layanan</a></li>
    </ul>
    <hr>
    <p>Butuh bantuan? Hubungi saya di <a href="mailto:fazril.hillaby@binus.ac.id">fazril.hillaby@binus.ac.id</a>.</p>
    ';
}

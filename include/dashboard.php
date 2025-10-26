<?php

// remove default post type
function unregister_default_post_type()
{
    unregister_post_type('post');
}
function remove_default_post_type()
{
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
}
function remove_default_node($wp_admin_bar)
{
    $wp_admin_bar->remove_node('new-post');
    $wp_admin_bar->remove_node('comments');
}
add_action('init', 'unregister_default_post_type', 100);
add_action('admin_menu', 'remove_default_post_type');
add_action('admin_bar_menu', 'remove_default_node', 999);
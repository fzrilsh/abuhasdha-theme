<?php

function update_product_slug_from_acf($post_id, $post, $update) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if ($post->post_type !== 'produk') return;
    
    $size = get_field('size', $post_id);
    $brand = get_field('brand', $post_id);
    $category = get_field('category', $post_id);
    $pattern = get_field('pattern', $post_id);
    $description = get_field('description', $post_id);

    if (!empty($size) && !empty($brand) && !empty($category)) {
        $new_slug = strtolower(sanitize_title($category)) . '-' . strtolower(sanitize_title($brand)) . '-' . strtolower(sanitize_title($size)) . '-' . strtolower(sanitize_title($pattern));
        $new_title = strtoupper($category) . ' ' . ucfirst($brand) . ' ' . strtoupper($size) . ' ' . strtoupper($pattern);

        remove_action('save_post_produk', 'update_product_slug_from_acf', 20);
        wp_update_post(array(
            'ID'         => $post_id,
            'post_title' => $new_title,
            'post_name'  => $new_slug,
            'post_content'  => $description,
        ));

        add_action('save_post_produk', 'update_product_slug_from_acf', 20, 3);
    }
}
add_action('save_post_produk', 'update_product_slug_from_acf', 20, 3);
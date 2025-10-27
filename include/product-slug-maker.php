<?php

function make_product_slug($post_id)
{
    $size = get_field('size', $post_id);
    $brand = get_field('brand', $post_id);
    $category = get_field('category', $post_id);
    $pattern = get_field('pattern', $post_id);
    $description = get_field('description', $post_id);

    $new_slug = strtolower(sanitize_title($category)) . '-' . strtolower(sanitize_title($brand)) . '-' . strtolower(sanitize_title($size)) . '-' . strtolower(sanitize_title($pattern));
    $new_title = strtoupper($category) . ' ' . ucfirst($brand) . ' ' . strtoupper($size) . ' ' . strtoupper($pattern);

    return [
        'ID'            => $post_id,
        'post_title'    => $new_title,
        'post_name'     => $new_slug,
        'post_content'  => $description,
    ];
}

function update_slug_from_acf($post_id, $post, $update)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if ($post->post_type !== 'produk' && $post->post_type !== 'layanan') return;

    remove_action('save_post_produk', 'update_slug_from_acf', 20);
    switch ($post->post_type) {
        case 'produk':
                $data = make_product_slug($post_id);
                wp_update_post($data);
            break;
            
        case 'layanan':
            // 
            break;
    }
    add_action('save_post_produk', 'update_slug_from_acf', 20, 3);
}
add_action('save_post_produk', 'update_product_slug_from_acf', 20, 3);

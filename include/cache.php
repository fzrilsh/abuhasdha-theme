<?php

add_action('save_post_product', function () {
    delete_transient('products');
    delete_transient('products_by_size');
});

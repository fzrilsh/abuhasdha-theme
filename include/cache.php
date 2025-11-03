<?php

add_action('save_post_product', function () {
    delete_transient('products');
});

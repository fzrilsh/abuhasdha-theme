<?php

$background = get_stylesheet_directory_uri() . "/assets/BG-Produk\ Layanan.png";
$products = get_query_var('products');

?>

<section style="background-image: url('<?= $background ?>');" class="w-full pt-26 pb-24 bg-orange bg-no-repeat bg-center bg-cover">
    <div class="container mx-auto max-w-3xl">
        <?php foreach ($products as $type_slug => $data): ?>
            <div class="flex flex-col gap-6">
                <div class="flex flex-row gap-10 items-center text-white">
                    <h1 class="font-bold text-3xl"><?= strtoupper($type_slug) ?></h1>
                    <h3 class="text-sm opacity-60"><?= $data['name'] ?></h3>
                </div>

                <?php foreach ($data['brands'] as $brand => $sizes): ?>
                    <div class="text-white flex flex-col gap-3">
                        <div>
                            <h3 class="text-lg font-bold"><?= strtoupper($brand) ?></h3>
                            <p>Size</p>
                        </div>
                        <div class="flex flex-col gap-3">
                            <?php foreach ($sizes as $size): ?>
                                <a href="<?= esc_url($data['link']) . $size; ?>" class="bg-dark-orange flex flex-row gap-8 items-center justify-between px-6 py-3 group">
                                    <h3 class="text-xl font-bold"><?= esc_html($size) ?></h3>
                                    <i class="fa-solid fa-chevron-right transition-transform duration-300 group-hover:translate-x-2"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
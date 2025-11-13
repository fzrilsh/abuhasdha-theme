<?php

$gallery_ids = explode(',', get_theme_mod('custom_gallery_images', ''));
$row1 = [];
$row2 = [];

foreach ($gallery_ids as $i => $gid) {
    if ($i % 2 === 0) {
        $row1[] = $gid;
    } else {
        $row2[] = $gid;
    }
}

?>

<section id="gallery" class="bg-white w-full flex flex-col gap-18 bg-no-repeat bg-center bg-cover">
    <div class="container mx-auto px-10 md:px-24 pt-18 pb-2">
        <div class="relative overflow-hidden flex justify-center items-center">
            <div class="w-full h-[3px] bg-dark-orange absolute bottom-1"></div>
            <div class="bg-white relative w-fit px-3">
                <h3 class="text-3xl font-bold text-dark-orange text-center">Galeri Produk</h3>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center items-center pt-2 pb-24">
        <div class="relative container mx-auto md:w-[85vw] overflow-hidden px-8 md:px-10">
            <div id="horizontal-gallery" class="overflow-x-auto scroll-smooth snap-x snap-mandatory w-full">
                <!-- safelist: w-[30vw] w-[50vw] w-[60vw] w-[100vw] md:w-[30vw] md:w-[50vw] -->
                <div class="inline-flex flex-col min-w-max">
                    <!-- Row 1 -->
                    <div class="flex flex-row flex-nowrap items-start gap-4">
                        <?php foreach ($row1 as $index => $id):
                            $url = wp_get_attachment_image_url($id, 'large');
                            $caption = wp_get_attachment_caption($id);
                            $w = ($index % 2 === 0) ? '30' : '50';
                            $wMobile = intval($w) * 2;
                        ?>
                            <figure class="relative w-[<?= $wMobile ?>vw] md:w-[<?= $w ?>vw] overflow-hidden shrink-0 group snap-center">
                                <!-- safelist: h-[220px] md:h-[300px] -->
                                <img class="block w-full h-[220px] md:h-[300px] object-cover" src="<?= esc_url($url) ?>" alt="<?= esc_attr($caption ?: 'Galeri') ?>">
                                <figcaption class="absolute bottom-0 left-0 right-0 bg-black/80 text-white px-4 py-2">
                                    <span class="text-sm md:text-base font-medium"><?= $caption ? esc_html($caption) : 'Kegiatan N/A' ?></span>
                                </figcaption>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                    <!-- Row 2 -->
                    <div class="flex flex-row flex-nowrap items-start gap-4">
                        <?php foreach ($row2 as $index => $id):
                            $url = wp_get_attachment_image_url($id, 'large');
                            $caption = wp_get_attachment_caption($id);
                            $w = ($index % 2 === 0) ? '50' : '30';
                            $wMobile = intval($w) * 2;
                        ?>
                            <figure class="relative w-[<?= $wMobile ?>vw] md:w-[<?= $w ?>vw] overflow-hidden shrink-0 group">
                                <!-- safelist: h-[220px] md:h-[300px] -->
                                <img class="block w-full h-[220px] md:h-[300px] object-cover" src="<?= esc_url($url) ?>" alt="<?= esc_attr($caption ?: 'Galeri') ?>">
                                <figcaption class="absolute bottom-0 left-0 right-0 bg-black/80 text-white px-4 py-2">
                                    <span class="text-sm md:text-base font-medium"><?= $caption ? esc_html($caption) : 'Kegiatan N/A' ?></span>
                                </figcaption>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <button id="prevBtn" class="absolute left-4 md:left-10 top-1/2 -translate-y-1/2 bg-dark-orange text-white p-2 md:py-2 md:px-4 shadow-md cursor-pointer select-none z-10">
                <img class="w-3 h-5 object-cover rotate-180" src="<?= get_template_directory_uri() . '/assets/icons/arrow-right.png' ?>" alt="Arrow Left">
            </button>
            <button id="nextBtn" class="absolute right-4 md:right-10 top-1/2 -translate-y-1/2 bg-dark-orange text-white p-2 md:py-2 md:px-4 shadow-md cursor-pointer select-none z-10">
                <img class="w-3 h-5 object-cover" src="<?= get_template_directory_uri() . '/assets/icons/arrow-right.png' ?>" alt="Arrow Right">
            </button>

            <div id="carousel-dots" class="w-full h-fit flex justify-center mt-6 gap-5"></div>
        </div>
    </div>
</section>
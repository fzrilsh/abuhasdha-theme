<?php

$gallery_ids = explode(',', get_theme_mod('custom_gallery_images', ''));
$chunks = array_chunk($gallery_ids, 4);

?>

<section id="gallery" class="bg-white w-full flex flex-col gap-18 bg-no-repeat bg-center bg-cover">
    <div class="px-10 md:px-24 pt-18 pb-2">
        <div class="relative overflow-hidden flex justify-center items-center">
            <div class="w-full h-[3px] bg-dark-orange absolute bottom-1"></div>
            <div class="bg-white relative w-fit px-3">
                <h3 class="text-3xl font-bold text-dark-orange text-center">Galeri Produk</h3>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center items-center pt-2 pb-24">
        <div class="relative w-[100vw] md:w-[85vw] overflow-hidden px-8 md:px-24">
            <div id="carousel-track" class="flex overflow-x-scroll snap-x snap-mandatory carousel-track scroll-smooth">
                <div class="w-full flex flex-col gap-3 flex-shrink-0 snap-center">
                    <?php foreach ($chunks as $chunkIndex => $chunk): ?>
                        <div class="flex flex-row gap-3">

                        <?php
                        foreach ($chunk as $itemIndex => $id):
                            $url = wp_get_attachment_image_url($id, 'large');
                            $caption = wp_get_attachment_caption($id);
                        ?>
                            <img class="md:w-full w-[<?= $chunkIndex % 2 === 0 ? ($itemIndex % 2 === 0 ? '30' : '70') : ($itemIndex % 2 === 0 ? '70' : '30') ?>%]" src="<?= esc_url($url) ?>" alt="<?= $caption ?>">
                        <?php endforeach; ?>

                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="w-full flex flex-col gap-3 flex-shrink-0 snap-center px-4"></div>
            </div>

            <button id="prevBtn" class="absolute left-10 md:left-32 top-1/2 -translate-y-1/2 bg-dark-orange text-white py-2 px-4 shadow-md cursor-pointer select-none">
                ◀
            </button>
            <button id="nextBtn" class="absolute right-10 md:right-32 top-1/2 -translate-y-1/2 bg-dark-orange text-white py-2 px-4 shadow-md cursor-pointer select-none">
                ▶
            </button>

            <div id="carousel-dots" class="w-full h-fit flex justify-center mt-6 gap-2"></div>
        </div>
    </div>
</section>
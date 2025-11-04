<?php

$image_url = esc_url(get_theme_mod('about_image', get_template_directory_uri() . '/assets/about.png'));
$description = nl2br(get_theme_mod('about_description'));

?>

<section id="about" class="w-full">
    <div class="container mx-auto md:h-fit h-auto py-35 flex flex-col gap-6 justify-center items-center px-8 md:px-24">
        <div class="text-left w-full relative flex overflow-hidden">
            <h2 class="text-3xl font-bold text-dark-orange after:ml-2 md:after:w-full after:h-[3px] after:bg-dark-orange after:absolute after:bottom-1">Tentang Abuhasdha</h2>
        </div>

        <div class="flex md:flex-row flex-col gap-6 items-center justify-center">
            <img class="w-[300px]" src="<?= $image_url ?>" alt="about">
            <div class="flex flex-col gap-6">
                <?= $description ?>
            </div>
        </div>
    </div>
</section>
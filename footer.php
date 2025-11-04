<?php

$phones = preg_split('/\r\n|\r|\n/', get_theme_mod('footer_phone'), -1, PREG_SPLIT_NO_EMPTY);
$addresses = preg_split('/\r\n|\r|\n/', get_theme_mod('footer_address'), -1, PREG_SPLIT_NO_EMPTY);
$addresses_url = preg_split('/\r\n|\r|\n/', get_theme_mod('footer_address_url'), -1, PREG_SPLIT_NO_EMPTY);

?>

    <footer id="contact" class="bg-dark-gray w-full flex flex-col gap-8">
        <div class="container mx-auto px-8 md:px-24 pt-12 pb-4">
            <div class="relative overflow-hidden flex justify-center items-center">
                <div class="w-full h-[3px] bg-white absolute bottom-1"></div>
                <div class="bg-dark-gray relative w-fit px-3">
                    <h3 class="text-3xl font-bold text-white text-center">Hubungi Kami</h3>
                </div>
            </div>
        </div>

        <section class="container mx-auto flex flex-col md:grid grid-cols-3 gap-8 px-8 md:px-24 pb-12">
            <div class="text-white flex flex-col gap-4">
                <p class="font-semibold"><?php bloginfo('description'); ?></p>
                <a class="bg-dark-orange px-5 py-3 w-fit font-bold" href="mailto:<?= get_theme_mod('footer_email'); ?>">Kirim Email</a>
            </div>

            <div class="text-white flex flex-col gap-4">
                <div class="flex gap-3">
                    <div>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h4 class="font-bold">Email</h4>
                        <a href="mailto:<?= get_theme_mod('footer_email'); ?>"><?= get_theme_mod('footer_email'); ?></a>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div>
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h4 class="font-bold">Telepon</h4>
                        <div class="flex flex-col gap-1">
                            <?php foreach ($phones as $phone): ?>
                                <a href="tel:<?= esc_attr(trim($phone)); ?>">
                                    <?= esc_html(trim($phone)); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-white">
                <div class="flex gap-3">
                    <div>
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h4 class="font-bold">Lokasi</h4>
                        <?php foreach ($addresses as $addressIndex => $address): ?>
                            <div class="flex flex-col gap-1">
                                <a href="<?= esc_attr(trim($addresses_url[$addressIndex])) ?>"><?= esc_attr(trim($address)) ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-dark-orange py-3 text-center">
            <p class="font-semibold text-white"><?= bloginfo('name'); ?> | <?= date('Y'); ?></p>
        </section>
    </footer>

    <?php
    wp_footer();
    ?>
    </body>

    </html>
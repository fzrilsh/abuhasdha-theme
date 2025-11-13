<?php

$background = get_stylesheet_directory_uri() . "/assets/BG-Produk\ Layanan.png";
$technical_label = esc_html(get_theme_mod('technical_label'));
$services = preg_split('/\r\n|\r|\n/', get_theme_mod('technical_services'), -1, PREG_SPLIT_NO_EMPTY);
$functions = get_terms([
    'taxonomy'   => 'function',
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
]);

?>

<section id="services" style="background-image: url('<?= $background ?>');" class="bg-orange w-full flex flex-col gap-18 bg-no-repeat bg-center bg-cover">
    <div class="container mx-auto px-10 md:px-24 pt-18 pb-4">
        <div class="relative overflow-hidden flex justify-center items-center">
            <div class="w-full h-[3px] bg-white absolute bottom-1"></div>
            <div class="bg-orange relative w-fit px-3">
                <h3 class="text-3xl font-bold text-white text-center">Produk Kami</h3>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-8 md:px-24 md:pt-6 pt-12 pb-24 flex flex-col gap-18">
        <div class="flex flex-wrap md:flex-row flex-col relative md:gap-x-6 gap-y-24 justify-center items-center">
            <?php foreach ($functions as $function): ?>
                <a href="<?= get_term_link(get_field('tire_type', $function)) ?>" class="bg-white/80 relative flex flex-col items-center justify-center md:flex-[0_0_calc(33%_-_1rem)] w-full md:h-[250px] h-60">
                    <div class="overflow-visible">
                        <img class="bg-cover mt-[-60%] h-[300px] overflow-visible" src="<?= get_field('tire_sample', $function) ?>" alt="<?= $function->name ?>">
                    </div>
                    <div class="h-[120px] w-full absolute top-15 left-0 overflow-hidden">
                        <div class="bg-white absolute w-[120%] h-[80px] z-1 -rotate-5 bottom-0"></div>
                        <div class="bg-orange absolute right-[10%] w-[70px] h-[70px] z-3 flex flex-col justify-center items-center rounded-full border-4 border-white p-2">
                            <img src="<?= get_field('icon', $function) ?>" alt="<?= $function->name ?>' Icon">
                        </div>
                    </div>
                    <div class="h-[116px] w-full z-2 absolute bottom-0 left-0">
                        <div class="h-full bg-white text-center flex w-full pb-4 justify-center">
                            <div class="h-full w-68 overflow-hidden">
                                <h3 class="text-orange font-bold text-xl"><?= $function->name ?></h3>
                                <p class="text-md"><?= nl2br(wp_trim_words($function->description)) ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="container mx-auto flex flex-col md:flex-row justify-center gap-8">
            <p class="text-white text-center font-semibold">Ingin berdiskusi lebih lanjut mengenai jenis ban yang paling sesuai<br> untuk kebutuhan operasional Anda? Tim kami siap membantu.</p>
            <a href="tel:<?= get_query_var('phone_number') ?>" class="bg-dark-orange px-5 py-3 text-white flex text-base flex-row gap-2 justify-center items-center font-bold">
                Konsultasikan Sekarang
                <svg width="16" height="16" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.45801 1.5L7.69824 1.50977C8.25555 1.55645 8.78891 1.76502 9.23242 2.11133C9.67588 2.45764 10.0071 2.92479 10.1875 3.4541L10.2559 3.68457L11.6172 9.12793L11.6611 9.33887C11.844 10.3983 11.4208 11.4814 10.5479 12.1348L10.5488 12.1357L9.05566 13.2549C9.72373 15.0051 10.7535 16.5953 12.0791 17.9209C13.4044 19.2462 14.9943 20.2753 16.7441 20.9434L17.8643 19.4512C18.5593 18.5239 19.7434 18.1011 20.8711 18.3828L26.3154 19.7441H26.3145C27.5999 20.0648 28.4999 21.2192 28.5 22.542V24.2305C28.5 25.3627 28.0506 26.4494 27.25 27.25C26.4494 28.0506 25.3627 28.5 24.2305 28.5H21.4619C10.4378 28.5 1.5 19.5622 1.5 8.53809V5.76953C1.5 4.63726 1.94936 3.55064 2.75 2.75C3.55064 1.94936 4.63726 1.5 5.76953 1.5H7.45801Z" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</section>

<section style="background-image: url('<?= $background ?>');" class="w-full flex flex-col pb-12 bg-no-repeat bg-center bg-cover">
    <div class="container mx-auto px-10 md:px-24 pb-8 flex flex-col gap-8">
        <div class="relative overflow-hidden flex justify-center items-center">
            <div class="w-full h-[3px] bg-white absolute bottom-1"></div>
            <div class="bg-orange relative w-fit px-3">
                <h3 class="text-3xl font-bold text-white text-center">Layanan Teknis</h3>
            </div>
        </div>
        <p class="text-white text-center font-semibold"><?= $technical_label ?></p>
    </div>

    <div class="container mx-auto px-10 md:px-24 pb-8 flex flex-row flex-wrap gap-4 justify-center">
        <?php foreach ($services as $service): ?>
            <span class="bg-dark-gray w-fit px-5 py-3">
                <p class="text-white font-semibold text-sm md:text-lg text-center"><?= esc_html(trim($service)) ?></p>
            </span>
        <?php endforeach; ?>
    </div>

    <div class="container mx-auto px-10 md:px-24 pb-18 flex flex-row flex-wrap gap-4 justify-center">
        <a href="tel:<?= get_query_var('phone_number') ?>" class="bg-dark-orange w-fit px-5 py-3">
            <p class="text-white font-semibold text-sm md:text-lg text-center flex flex-row gap-4 justify-center items-center">
                Jadwalkan Konsultasi Teknis
                <svg width="24" height="21" viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.6346 12C11.6346 12.1547 11.5718 12.3031 11.46 12.4125C11.3482 12.5219 11.1966 12.5833 11.0385 12.5833C10.8804 12.5833 10.7287 12.5219 10.6169 12.4125C10.5051 12.3031 10.4423 12.1547 10.4423 12C10.4423 11.8453 10.5051 11.6969 10.6169 11.5875C10.7287 11.4781 10.8804 11.4167 11.0385 11.4167C11.1966 11.4167 11.3482 11.4781 11.46 11.5875C11.5718 11.6969 11.6346 11.8453 11.6346 12ZM11.6346 12H11.0385M17.5962 12C17.5962 12.1547 17.5333 12.3031 17.4215 12.4125C17.3097 12.5219 17.1581 12.5833 17 12.5833C16.8419 12.5833 16.6903 12.5219 16.5785 12.4125C16.4667 12.3031 16.4038 12.1547 16.4038 12C16.4038 11.8453 16.4667 11.6969 16.5785 11.5875C16.6903 11.4781 16.8419 11.4167 17 11.4167C17.1581 11.4167 17.3097 11.4781 17.4215 11.5875C17.5333 11.6969 17.5962 11.8453 17.5962 12ZM17.5962 12H17M23.5577 12C23.5577 12.1547 23.4949 12.3031 23.3831 12.4125C23.2713 12.5219 23.1196 12.5833 22.9615 12.5833C22.8034 12.5833 22.6518 12.5219 22.54 12.4125C22.4282 12.3031 22.3654 12.1547 22.3654 12C22.3654 11.8453 22.4282 11.6969 22.54 11.5875C22.6518 11.4781 22.8034 11.4167 22.9615 11.4167C23.1196 11.4167 23.2713 11.4781 23.3831 11.5875C23.4949 11.6969 23.5577 11.8453 23.5577 12ZM23.5577 12H22.9615M1.5 16.6822C1.5 19.1711 3.28528 21.3396 5.80344 21.702C7.53149 21.9509 9.27703 22.1422 11.0385 22.276V29.5L17.6899 22.9931C18.0193 22.6721 18.4621 22.4872 18.9268 22.4767C22.0293 22.402 25.1244 22.1433 28.195 21.702C30.7147 21.3396 32.5 19.1727 32.5 16.6807V7.31934C32.5 4.82734 30.7147 2.66045 28.1966 2.298C24.4892 1.76556 20.7471 1.49885 17 1.5C13.1973 1.5 9.45826 1.77223 5.80344 2.298C3.28528 2.66045 1.5 4.82889 1.5 7.31934V16.6807V16.6822Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </p>
        </a>
    </div>
</section>
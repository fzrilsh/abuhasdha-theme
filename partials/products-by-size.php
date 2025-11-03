<?php

$products = get_query_var('products');

?>

<section class="flex flex-col justify-center items-center py-10 md:px-20">
    <?php if ($products->have_posts()): ?>
        <?php while ($products->have_posts()): $products->the_post(); ?>
            <div class="md:grid md:grid-cols-3 flex flex-col justify-center items-center">
                <div class="flex flex-col gap-2 py-14 items-center justify-center">
                    <div class="w-full relative md:w-[600px] overflow-hidden px-8 md:px-24">
                        <div id="carousel-track" class="flex overflow-x-hidden snap-x snap-mandatory carousel-track scroll-smooth">
                            <?php foreach (array_filter(explode(',', get_field('images', get_the_ID()))) as $imageID): ?>
                                <div class="w-full flex flex-col gap-3 flex-shrink-0 snap-center px-4">
                                    <img class="w-full md:h-[350px] h-[250px] object-contain" src="<?= wp_get_attachment_url($imageID, 'large') ?>" alt="<?= $imageID ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Tombol Navigasi -->
                        <button id="prevBtn" class="prevBtn absolute left-10 md:left-32 top-1/2 -translate-y-1/2 text-white py-2 px-4 cursor-pointer text-black">
                            <i class="fa-solid fa-chevron-left text-black"></i>
                        </button>
                        <button id="nextBtn" class="nextBtn absolute right-10 md:right-32 top-1/2 -translate-y-1/2 text-white py-2 px-4 cursor-pointer text-black">
                            <i class="fa-solid fa-chevron-right text-black"></i>
                        </button>

                        <div id="carousel-dots" class="w-full h-fit flex justify-center mb-6 gap-2"></div>
                    </div>

                    <div class="flex flex-row gap-5 items-center justify-center pb-6">
                        <?php foreach (get_the_terms(get_the_ID(), 'function') as $function): ?>
                            <div class="bg-orange w-[70px] h-[70px] flex flex-col justify-center items-center rounded-full border-4 border-white p-2">
                                <img src="<?= get_field('icon', 'term_' . $function->term_id); ?>" alt="<?= $function->name ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="grid md:grid-cols-5 grid-cols-4 gap-y-2">
                        <?php foreach (get_the_terms(get_the_ID(), 'advantage') as $advantage): ?>
                            <div class="w-[80px] items-center text-center flex flex-col gap-1">
                                <div class="w-[58px] h-[58px] bg-orange flex justify-center items-center">
                                    <img src="<?= get_field('icon', 'term_' . $advantage->term_id); ?>" alt="<?= $advantage->name ?>">
                                </div>
                                <p class="text-xs font-medium text-dark-gray"><?= $advantage->name ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="h-full flex flex-col justify-center gap-6 pb-8 px-12">
                    <div class="flex flex-col gap-3">
                        <div>
                            <h3 class="font-semibold text-lg text-orange">Size</h3>
                            <p class="font-bold text-3xl"><?= get_field('size', get_the_ID()) ?></p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg text-orange">Pattern</h3>
                            <p class="font-bold text-3xl"><?= get_field('pattern', get_the_ID()) ?></p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg text-orange">Brand</h3>
                            <p class="font-bold text-3xl"><?= strtoupper(get_field('brand', get_the_ID())) ?></p>
                        </div>
                    </div>

                    <div>
                        <?= the_content(); ?>
                    </div>
                </div>

                <div class="flex flex-col items-center justify-center pb-8">
                    <table>
                        <tr class="bg-orange">
                            <td class="flex flex-col px-3 py-2 font-bold">Size</td>
                            <td class="px-3 py-2 font-bold"><?= get_field('size', get_the_ID()) ?></td>
                        </tr>
                        <tr class=" bg-gray-200">
                            <td class="flex flex-col px-3 py-2 font-bold">TT/TL</td>
                            <td class="px-3 py-2 font-bold"><?= get_field('tttl', get_the_ID()) ?></td>
                        </tr>
                        <tr class="bg-orange">
                            <td class="flex flex-col px-3 py-2 font-bold">Rim</td>
                            <td class="px-3 py-2 font-bold"><?= get_field('rim', get_the_ID()) ?></td>
                        </tr>
                        <tr class=" bg-gray-200">
                            <td class="flex flex-col px-3 py-2 font-bold">TRA</td>
                            <td class="px-3 py-2 font-bold"><?= get_field('tra', get_the_ID()) ?></td>
                        </tr>
                        <tr class="bg-orange">
                            <td class="flex flex-col px-3 py-2 font-bold">Load/Speed Index</td>
                            <td class="px-3 py-2 font-bold"><?= get_field('loadspeed_index', get_the_ID()) ?></td>
                        </tr>
                        <tr class=" bg-gray-200">
                            <td class="flex flex-col px-3 py-2 font-bold">Star Rating</td>
                            <td class="px-3 py-2 font-bold"><?= get_field('star_rating', get_the_ID()) ?></td>
                        </tr>
                        <tr class="bg-orange">
                            <td class="flex flex-col px-3 py-2 font-bold">
                                Tread Depth
                                <span class="text-xs font-normal">(mm/32ND)</span>
                            </td>
                            <td class="px-3 py-2 font-bold"><?= get_field('tread_depth', get_the_ID()) ?></td>
                        </tr>
                        <tr class=" bg-gray-200">
                            <td class="flex flex-col px-3 py-2 font-bold">
                                Outer Diameter
                                <span class="text-xs font-normal">(mm/inch)</span>
                            </td>
                            <td class="px-3 py-2 font-bold"><?= get_field('outer_diameter', get_the_ID()) ?></td>
                        </tr>
                        <tr class="bg-orange">
                            <td class="flex flex-col px-3 py-2 font-bold">
                                Section Width
                                <span class="text-xs font-normal">(mm/inch)</span>
                            </td>
                            <td class="px-3 py-2 font-bold"><?= get_field('section_width', get_the_ID()) ?></td>
                        </tr>
                        <tr class=" bg-gray-200">
                            <td class="flex flex-col px-3 py-2 font-bold">
                                Inflation Pressure
                                <span class="text-xs font-normal">(Kpa/PSI)</span>
                            </td>
                            <td class="px-3 py-2 font-bold"><?= get_field('inflation_pressure', get_the_ID()) ?></td>
                        </tr>
                        <tr class="bg-orange">
                            <td class="flex flex-col px-3 py-2 font-bold">
                                Load Capacity
                                <span class="text-xs font-normal">(Kg/Lbs)</span>
                            </td>
                            <td class="px-3 py-2 font-bold"><?= get_field('load_capacity', get_the_ID()) ?></td>
                        </tr>
                        <tr class=" bg-gray-200">
                            <td class="flex flex-col px-3 py-2 font-bold">
                                Speed
                                <span class="text-xs font-normal">(Km/mph)</span>
                            </td>
                            <td class="px-3 py-2 font-bold"><?= get_field('speed', get_the_ID()) ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <?php if ($products->current_post + 1 !== $products->post_count): ?>
                <div class="border border-1 border-[#A8A8A8] w-full"></div>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll('.carousel-track').forEach(carousel => {
            const slides = carousel.querySelectorAll("img");
            const prevBtn = carousel.parentElement.querySelector('.prevBtn');
            const nextBtn = carousel.parentElement.querySelector('.nextBtn');
            const dotsContainer = carousel.parentElement.querySelector("#carousel-dots");
            let index = 0;

            slides.forEach((_, i) => {
                const dot = document.createElement("button");
                dot.className = "w-3 h-3 rounded-full transition-all duration-300 " +
                    (i === 0 ? "bg-orange" : "bg-gray-300");
                dot.addEventListener("click", () => goTo(i));
                dotsContainer?.appendChild(dot);
            });

            const dots = dotsContainer?.querySelectorAll("button") || [];

            function goTo(i) {
                index = (i + slides.length) % slides.length;
                carousel.scrollTo({
                    left: carousel.clientWidth * index,
                    behavior: 'smooth'
                });
                updateDots();
            }

            function updateDots() {
                dots.forEach((dot, i) => {
                    dot.classList.toggle("bg-orange", i === index);
                    dot.classList.toggle("bg-gray-300", i !== index);
                });
            }

            nextBtn?.addEventListener("click", () => goTo(index + 1));
            prevBtn?.addEventListener("click", () => goTo(index - 1));

            carousel.addEventListener("scroll", () => {
                const newIndex = Math.round(carousel.scrollLeft / carousel.clientWidth);
                if (newIndex !== index) {
                    index = newIndex;
                    updateDots();
                }
            });
        });
    });
</script>
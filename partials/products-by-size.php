<?php
$products = get_query_var('products');
?>

<section class="container mx-auto flex flex-col justify-center items-center py-6 px-6 md:py-10">
    <?php if ($products->have_posts()): ?>
        <?php while ($products->have_posts()): $products->the_post(); ?>

            <div class="md:grid md:grid-cols-[auto_1fr_1.2fr] flex flex-col pt-10 gap-y-8 md:gap-x-8">

                <div class="relative w-60 h-fit overflow-hidden md:mx-0 mx-auto">
                    <div class="carousel-track w-full max-auto flex overflow-x-hidden snap-x snap-mandatory scroll-smooth">
                        <?php foreach (array_filter(explode(',', get_field('images', get_the_ID()))) as $imageID): ?>
                            <div class="w-full h-90 flex flex-col justify-center items-center gap-3 flex-shrink-0 snap-center">
                                <img class="w-60 h-60 object-contain" src="<?= wp_get_attachment_url($imageID, 'large') ?>" alt="<?= $imageID ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button class="prevBtn absolute left-0 top-1/2 -translate-y-1/2 py-2 cursor-pointer select-none text-2xl">
                        <i class="fa-solid fa-chevron-left text-black"></i>
                    </button>
                    <button class="nextBtn absolute right-0 top-1/2 -translate-y-1/2 py-2 cursor-pointer select-none text-2xl">
                        <i class="fa-solid fa-chevron-right text-black"></i>
                    </button>

                    <div class="carousel-dots w-full h-fit flex justify-center mb-6 gap-2"></div>
                </div>

                <div class="w-full h-fit flex flex-col gap-4 px-4 md:px-0">
                    <div class="w-full flex flex-col gap-y-5 md:grid md:grid-cols-2 md:gap-x-5 md:gap-y-5 md:items-start">

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

                        <div class="flex flex-row flex-nowrap gap-1 items-center pt-2 overflow-x-auto">
                            <?php foreach (get_the_terms(get_the_ID(), 'function') as $function): ?>
                                <div class="bg-orange w-[50px] h-[50px] min-w-[50px] min-h-[50px] aspect-square shrink-0 flex flex-col justify-center items-center rounded-full overflow-hidden border-4 border-white p-2">
                                    <img class="w-full h-full object-contain" src="<?= get_field('icon', 'term_' . $function->term_id); ?>" alt="<?= $function->name ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <div class="prose"> <?php the_content(); ?></div>
                </div>

                <div class="w-full h-fit">
                    <div class="flex flex-col md:grid md:grid-cols-2 gap-4">
                        <table class="flex flex-col h-full">
                            <tbody class="flex flex-col flex-1">
                                <tr class="flex-1 bg-orange flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">Size</td>
                                    <td class="px-3 py-1 font-bold"><?= get_field('size', get_the_ID()) ?></td>
                                </tr>
                                <tr class="flex-1 bg-gray-200 flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">TT/TL</td>
                                    <td class="px-3 py-1 font-bold"><?= get_field('tttl', get_the_ID()) ?></td>
                                </tr>
                                <tr class="flex-1 bg-orange flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">Rim</td>
                                    <td class="px-3 py-1 font-bold"><?= get_field('rim', get_the_ID()) ?></td>
                                </tr>
                                <tr class="flex-1 bg-gray-200 flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">TRA</td>
                                    <td class="px-3 py-1 font-bold"><?= get_field('tra', get_the_ID()) ?></td>
                                </tr>
                                <tr class="flex-1 bg-orange flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">Load/Speed Index</td>
                                    <td class="px-3 py-1 font-bold"><?= get_field('loadspeed_index', get_the_ID()) ?></td>
                                </tr>
                                <tr class="flex-1 bg-gray-200 flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">Star Rating</td>
                                    <td class="px-3 py-1 font-bold">
                                        <?php for ($i = 0; $i < (int)get_field('star_rating', get_the_ID()); $i++): ?>
                                            <i class="fa-solid fa-star"></i>
                                        <?php endfor; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="flex flex-col h-full">
                            <tbody class="flex flex-col flex-1">
                                <tr class="flex-1 bg-orange flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">
                                        Tread Depth
                                        <span class="text-xs font-normal">(mm/32ND)</span>
                                    </td>
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight"><?= get_field('tread_depth', get_the_ID()) ?></td>
                                </tr>
                                <tr class="flex-1 bg-gray-200 flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">
                                        Outer Diameter
                                        <span class="text-xs font-normal">(mm/inch)</span>
                                    </td>
                                    <td class="px-3 py-1 font-bold"><?= get_field('outer_diameter', get_the_ID()) ?></td>
                                </tr>
                                <tr class="flex-1 bg-orange flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">
                                        Section Width
                                        <span class="text-xs font-normal">(mm/inch)</span>
                                    </td>
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight"><?= get_field('section_width', get_the_ID()) ?></td>
                                </tr>
                                <tr class="flex-1 bg-gray-200 flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">
                                        Inflation Pressure
                                        <span class="text-xs font-normal">(Kpa/PSI)</span>
                                    </td>
                                    <td class="px-3 py-1 font-bold"><?= get_field('inflation_pressure', get_the_ID()) ?></td>
                                </tr>
                                <tr class="flex-1 bg-orange flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">
                                        Load Capacity
                                        <span class="text-xs font-normal">(Kg/Lbs)</span>
                                    </td>
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight"><?= get_field('load_capacity', get_the_ID()) ?></td>
                                </tr>
                                <tr class="flex-1 bg-gray-200 flex flex-row justify-between items-center">
                                    <td class="px-3 py-1 font-bold flex flex-col leading-tight">
                                        Speed
                                        <span class="text-xs font-normal">(Km/mph)</span>
                                    </td>
                                    <td class="px-3 py-1 font-bold"><?= get_field('speed', get_the_ID()) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="h-fit flex flex-row flex-wrap gap-2 pt-4">
                        <?php foreach (get_the_terms(get_the_ID(), 'advantage') as $advantage): ?>
                            <div class="flex-1 items-center text-center flex flex-col gap-1">
                                <div class="w-full h-10 bg-orange flex justify-center items-center">
                                    <img class="w-[30px] h-[30px]" src="<?= get_field('icon', 'term_' . $advantage->term_id); ?>" alt="<?= $advantage->name ?>">
                                </div>
                                <p class="text-[8px] font-medium text-dark-gray"><?= $advantage->name ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <?php if ($products->current_post + 1 !== $products->post_count): ?>
                <div class="border border-1 border-[#A8A8A8] w-full my-12"></div>
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
            const dotsContainer = carousel.parentElement.querySelector(".carousel-dots");
            let index = 0;

            if (dotsContainer) dotsContainer.innerHTML = '';

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

            updateDots();
        });
    });
</script>
<?php

$background = esc_url(get_theme_mod('hero_image', get_template_directory_uri() . '/assets/images/default.jpg'));
$hero_heading = get_theme_mod('hero_heading');
$hero_description = get_theme_mod('hero_description');

?>

<section id="home" class="relative w-full h-screen bg-cover bg-center" style="background-image: url('<?= $background ?>');">
    <div class="absolute inset-0 bg-gradient-to-r from-orange to-transparent w-[80%]"></div>
    <div class="relative z-10 flex flex-col justify-center items-start h-full text-white gap-4 container mx-auto px-8 md:px-24">
        <h1 class="md:text-5xl text-3xl font-bold text-left md:w-[560px]">
            <?= $hero_heading ?>
        </h1>
        <p class="text-left md:text-lg text-md md:w-[440px]">
            <?= $hero_description ?>
        </p>

        <div class="text-left flex gap-4 font-bold">
            <a href="<?= home_url("/products") ?>" class="bg-dark-orange px-5 py-3">Lihat Produk</a>
            <a href="tel:<?= get_query_var('phone_number') ?>" class="bg-white px-5 py-3 text-dark-orange flex flex-row gap-2 justify-center items-center">
                Hubungi Kami
                <svg width="18" height="18" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.45801 1.5L7.69824 1.50977C8.25555 1.55645 8.78891 1.76502 9.23242 2.11133C9.67588 2.45764 10.0071 2.92479 10.1875 3.4541L10.2559 3.68457L11.6172 9.12793L11.6611 9.33887C11.844 10.3983 11.4208 11.4814 10.5479 12.1348L10.5488 12.1357L9.05566 13.2549C9.72373 15.0051 10.7535 16.5953 12.0791 17.9209C13.4044 19.2462 14.9943 20.2753 16.7441 20.9434L17.8643 19.4512C18.5593 18.5239 19.7434 18.1011 20.8711 18.3828L26.3154 19.7441H26.3145C27.5999 20.0648 28.4999 21.2192 28.5 22.542V24.2305C28.5 25.3627 28.0506 26.4494 27.25 27.25C26.4494 28.0506 25.3627 28.5 24.2305 28.5H21.4619C10.4378 28.5 1.5 19.5622 1.5 8.53809V5.76953C1.5 4.63726 1.94936 3.55064 2.75 2.75C3.55064 1.94936 4.63726 1.5 5.76953 1.5H7.45801Z" stroke="#D4480D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</section>

<section class="md:h-fit py-18 w-full bg-[#3A3A3A] flex justify-center items-center">
    <div class="flex flex-col gap-18 md:gap-0 md:grid grid-cols-3 justify-around container mx-auto">
        <div>
            <div class="font-bold text-orange mb-3 flex flex-col justify-center items-center text-center">
                <div class="text-center w-[70%] flex flex-col gap-6">
                    <h2 class="text-9xl">40+</h2>
                    <h2 class="text-4xl">Tahun <br>Pengalaman</h2>
                </div>
            </div>
            <div class="text-white flex items-center justify-center">
                <div class="text-center w-[70%] flex flex-col gap-2">
                    <p>Mitra terpercaya industri <br>sejak 1980</p>
                </div>
            </div>
        </div>

        <div>
            <div class="flex justify-center items-center">
                <svg class="mb-6" width="120" height="120" viewBox="0 0 171 171" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M92.126 6.27783V11.2944C92.126 14.2443 93.433 17.0352 95.7026 18.9253L105.134 26.7858C109.038 30.0448 109.859 35.7062 107.042 39.9455L102.538 46.7109C100.085 50.3869 96.4775 53.1404 92.285 54.5361L91.0221 54.96C89.5971 55.4365 88.3012 56.2351 87.2348 57.2937C86.1685 58.3523 85.3605 59.6425 84.8736 61.0641C84.3867 62.4857 84.234 64.0004 84.4273 65.4906C84.6207 66.9807 85.1549 68.4063 85.9884 69.6565C89.2471 74.5583 87.4808 81.2 82.2175 83.8319L59.0094 95.4372L62.745 104.79C63.4984 106.69 63.5373 108.798 62.8545 110.725C62.1717 112.651 60.8136 114.264 59.032 115.265C57.2505 116.266 55.1664 116.586 53.1664 116.167C51.1664 115.748 49.3862 114.618 48.156 112.986L42.1597 104.985C41.1435 103.63 39.798 102.558 38.2509 101.87C36.7039 101.182 35.0067 100.9 33.3203 101.052C31.634 101.205 30.0146 101.785 28.6157 102.739C27.2169 103.693 26.085 104.989 25.3277 106.504L19.2695 118.621L13.8649 119.973M92.126 6.27783C78.1645 5.10613 64.1415 7.65503 51.4778 13.6495C38.8141 19.6439 27.9598 28.8797 20.0148 40.421C12.0699 51.9623 7.31653 65.3988 6.23652 79.3692C5.15651 93.3395 7.7882 107.347 13.8649 119.973M92.126 6.27783C105.97 7.4326 119.27 12.2052 130.7 20.1032C142.13 28.0011 151.29 38.7573 157.267 51.2995C163.244 63.8416 165.83 77.7316 164.767 91.5848C163.703 105.438 159.028 118.77 151.206 130.253L149.643 125.581C148.323 121.624 145.792 118.183 142.408 115.745C139.024 113.307 134.959 111.996 130.788 111.997H125.243L122.381 109.136C120.944 107.696 119.185 106.618 117.25 105.992C115.314 105.366 113.257 105.209 111.249 105.534C109.241 105.86 107.339 106.658 105.7 107.863C104.061 109.068 102.732 110.646 101.823 112.465L101.505 113.11C100.637 114.847 99.4186 116.384 97.9257 117.625C96.4328 118.866 94.6984 119.782 92.8325 120.317L84.0897 122.808C79.2326 124.194 76.1947 129.008 77.0248 133.998L77.6695 137.866C78.376 142.053 81.9967 145.117 86.2357 145.117C93.7068 145.117 100.348 149.904 102.706 156.996L104.604 162.675M13.8649 119.973C21.7811 136.434 35.1246 149.666 51.6504 157.443C68.1763 165.22 86.8762 167.068 104.604 162.675M104.604 162.675C123.591 157.965 140.177 146.426 151.197 130.262M118.619 59.0051C118.619 66.9186 115.149 74.0195 109.647 78.8772" stroke="#FF920F" stroke-width="12" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <div class="text-white flex items-center justify-center">
                <div class="text-center w-[80%] flex flex-col gap-3">
                    <h2 class="text-4xl font-bold text-orange">Produk Global,<br> Standar Internasional</h2>

                    <p>Distributor resmi<br>Tianli Tyres</p>
                </div>
            </div>
        </div>

        <div>
            <div class="flex justify-center items-center">
                <svg class="mb-8" width="120" height="120" viewBox="0 0 140 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M66.4742 91.0828L104.733 129.342C108.014 132.518 112.413 134.278 116.979 134.24C121.546 134.203 125.915 132.373 129.144 129.144C132.373 125.914 134.204 121.545 134.241 116.979C134.278 112.412 132.519 108.014 129.342 104.733L90.7749 66.1652M66.4742 91.0828L82.854 71.1986C84.9343 68.6786 87.7102 67.0905 90.7815 66.1718C94.3908 65.0955 98.4136 64.938 102.22 65.253C107.351 65.6936 112.507 64.7849 117.178 62.617C121.849 60.4491 125.872 57.0975 128.848 52.8947C131.824 48.6919 133.649 43.784 134.142 38.6581C134.635 33.5321 133.779 28.3664 131.659 23.6734L110.16 45.1785C106.564 44.3468 103.273 42.5218 100.662 39.9113C98.0516 37.3009 96.2266 34.0098 95.3949 30.413L116.893 8.91444C112.2 6.79452 107.035 5.93865 101.909 6.43176C96.7828 6.92486 91.875 8.74979 87.6722 11.7255C83.4693 14.7011 80.1177 18.7241 77.9498 23.3951C75.782 28.0661 74.8732 33.2229 75.3138 38.3536C75.911 45.4148 74.8479 53.2109 69.3813 57.7128L68.712 58.2706M66.4742 91.0828L35.926 128.18C34.4454 129.985 32.6034 131.46 30.5185 132.51C28.4336 133.559 26.1519 134.161 23.8205 134.276C21.489 134.391 19.1593 134.016 16.9813 133.176C14.8034 132.336 12.8255 131.049 11.1748 129.399C9.52423 127.748 8.23751 125.77 7.3975 123.592C6.5575 121.414 6.18281 119.084 6.29756 116.753C6.41231 114.421 7.01396 112.14 8.06379 110.055C9.11361 107.97 10.5883 106.128 12.3931 104.647L57.2605 67.7008L30.3085 40.7489H21.0621L6.29655 16.1397L16.1402 6.29602L40.7494 21.0615V30.308L68.7054 58.264L57.2539 67.6943M112.116 112.115L94.8896 94.889M23.4705 117.037H23.523V117.09H23.4705V117.037Z" stroke="#FF920F" stroke-width="10" />
                </svg>
            </div>

            <div class="text-white flex items-center justify-center">
                <div class="text-center w-[80%] flex flex-col gap-3">
                    <h2 class="text-4xl font-bold text-orange">Layanan Teknis<br>Lengkap</h2>

                    <p>Dari inspeksi onsite hingga<br>training tim operasional</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_header(); ?>

<main id="site-content">

    <section class="relative w-full h-screen bg-cover bg-center" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/landing.jpg');">
        <div class="absolute inset-0 bg-gradient-to-r from-orange to-transparent w-full md:w-[60%]"></div>
        <div class="relative z-10 flex flex-col justify-center items-start h-full text-white gap-4 w-full px-8 md:px-24">
            <h1 class="text-4xl font-bold text-left md:w-[400px]">
                Tyres You Can Rely On. Solusi Ban Alat Berat dan Industri Anda!
            </h1>
            <p class="text-left text-lg md:w-[400px]">
                Dengan pengalaman lebih dari 40 tahun, Abuhasdha menyediakan ban Off-The-Road (OTR), truk, bus, dan industri yang tangguh, berkualitas, dan didukung layanan teknis menyeluruh.
            </p>
            <div class="text-left flex flex-wrap gap-4">
                <a class="bg-dark-orange px-5 py-3" href="#">Lihat Produk Kami</a>
                <a class="bg-white px-5 py-3 text-dark-orange" href="#">Hubungi Kami</a>
            </div>
        </div>
    </section>

    <section class="py-16 w-full bg-[#3A3A3A] flex justify-center items-center">
        <div class="w-full max-w-6xl mx-auto flex flex-col gap-12 md:gap-0 md:grid grid-cols-3">
            <div class="px-4">
                <div class="text-6xl font-bold text-orange mb-8 flex flex-col justify-center items-center text-center md:text-left">
                    <div class="w-full md:w-[70%]">
                        <h2>70+</h2>
                        <h2>Negara</h2>
                    </div>
                </div>
                <div class="text-white flex items-center justify-center">
                    <div class="text-center md:text-left w-full md:w-[70%] flex flex-col gap-2">
                        <h3 class="font-bold text-xl">Keandalan Terbukti: </h3>
                        <p>Didukung oleh kemitraan global dengan Tianli Tyres, produk kami digunakan di lebih dari 70 negara.</p>
                    </div>
                </div>
            </div>
            <div class="px-4">
                <div class="flex justify-center items-center h-[152px]">
                    <img class="w-[120px] mb-8" src="<?php echo get_template_directory_uri(); ?>/assets/icons/cube.png" alt="Cube Icon">
                </div>
                <div class="text-white flex items-center justify-center">
                    <div class="text-center md:text-left w-full md:w-[70%] flex flex-col gap-2">
                        <h3 class="font-bold text-xl">Solusi Lengkap: </h3>
                        <p>Menyediakan berbagai jenis ban untuk pertambangan, konstruksi, agribisnis, forestry, pelabuhan, hingga transportasi.</p>
                    </div>
                </div>
            </div>
            <div class="px-4">
                 <div class="flex justify-center items-center h-[152px]">
                    <img class="w-[150px] mb-8" src="<?php echo get_template_directory_uri(); ?>/assets/icons/gear.png" alt="Gear Icon">
                </div>
                <div class="text-white flex items-center justify-center">
                    <div class="text-center md:text-left w-full md:w-[70%] flex flex-col gap-2">
                        <h3 class="font-bold text-xl">Layanan Purna Jual:</h3>
                        <p>Inspeksi ban, rekomendasi teknis, analisis performa, hingga pelatihan onsite untuk memastikan operasi Anda berjalan efisien.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full">
        <span class="w-full h-[200px] block bg-no-repeat bg-center bg-cover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/building.png');"></span>
        <div class="max-w-4xl mx-auto py-16 px-4 flex flex-col gap-6 justify-center items-center">
            <div class="text-left w-full">
                <h2 class="text-3xl font-bold text-dark-orange">Tentang Abuhasdha</h2>
            </div>
            <div class="flex flex-col gap-6 text-gray-700">
                <p>PT. Abuhasdha didirikan pada tahun 1980 oleh Mr. Halim Soeganha, dan sejak itu menjadi salah satu penyedia ban OTR, truk, dan industri terkemuka di Indonesia. Dengan pengalaman lebih dari empat dekade, kami tidak hanya menawarkan produk berkualitas, tetapi juga menjadi mitra strategis bagi berbagai sektor industri.</p>
                <p>Sebagai distributor resmi Tianli Tyres, kami memastikan setiap produk memenuhi standar internasional dengan dukungan fasilitas produksi modern, sertifikasi ISO, serta komitmen pada efisiensi energi dan ramah lingkungan.</p>
                <p>Kami percaya bahwa ban bukan sekadar komponen kendaraan, melainkan faktor penting dalam mendukung produktivitas, keamanan, dan keberlanjutan bisnis Anda.</p>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
    <footer class="bg-dark-gray w-full flex flex-col gap-8">
        <div class="px-8 md:px-24 pt-12 pb-4">
            <div class="relative overflow-hidden flex justify-center items-center">
                <div class="w-full h-[3px] bg-white absolute bottom-1"></div>
                <div class="bg-dark-gray relative w-fit px-3">
                    <h3 class="text-3xl font-bold text-white text-center">Hubungi Kami</h3>
                </div>
            </div>
        </div>

        <section class="flex flex-col md:grid grid-cols-3 gap-8 px-8 md:px-24 pb-12">
            <div class="text-white flex flex-col gap-4">
                <p class="font-semibold">Tim kami siap membantu kebutuhan ban dan layanan teknis Anda.</p>
                <a class="bg-dark-orange px-5 py-3 w-fit font-bold" href="#">Kirim Email</a>
            </div>

            <div class="text-white flex flex-col gap-4">
                <div class="flex gap-3">
                    <div>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h4 class="font-bold">Email</h4>
                        <a href="mailto:abuhasdha80@cbn.net.id">abuhasdha80@cbn.net.id</a>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div>
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="flex flex-col gap-1">
                        <h4 class="font-bold">Telepon</h4>
                        <div class="flex flex-col gap-1">
                            <a href="tel:(021) 63863210">(021) 63863210</a>
                            <a href="tel:(021) 63863012">(021) 63863012</a>
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
                        <div class="flex flex-col gap-1">
                            <a href="https://share.google/Yr2nBExkCfqfErbXY">Jl. Kyai Caringin No.14B, Jakarta, 10150, DKI Jakarta, Indonesia.</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-dark-orange py-3 text-center">
            <p class="font-semibold text-white">PT ABUHASDHA & CO | <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
        </section>
    </footer>

    <?php
    wp_footer();
    ?>
</body>

</html>
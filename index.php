<?php
// Load Komponen DB
include "includes/db.php";
// Load Komponen Header
include "includes/header.php";
// Load Komponen Navigasi
include "includes/navigation.php";
// Load Komponen Hero
include "includes/hero.php";
?>
<section class="main-jojow-why">
    <div class="container xs-px-20">
        <hr class="mb-100 md-mt-80 md-mb-40 xs-mt-56 xs-mb-56">
        <div class="section-title text-center mb-20 xs-mt-8 xs-mb-18">Kenapa Memilih Jojow?</div>
        <div class="section-desc text-opensans">
            Kini rasanya semakin mudah membeli semua kebutuhan tanpa harus repot-repot meninggalkan rumah. Bahkan
            sekarang
            kamu juga bisa beli buah online segar loh! Belanja buah online tentu harus di tempat terpercaya. Kamu nggak
            perlu susah lagi cari toko buah online terdekat karena di situs Jojow membeli buah langsung dari petaninya
            dengan kualitas buah segar terbaik.
        </div>
        <div
            class="flex md-flex-col sm-flex-col xs-flex-col lg-justify-around md-items-center mt-64 -lg-mx-56 xs-mt-36">
            <div
                class="ill mr-80 lg-mr-0 md-mr-0 sm-mr-0 position-static lg-mb-40 md-order-last sm-order-last xs-order-last md-mt-72 sm-mt-72 xs-mr-0 xs-mt-56 xs-w-full xs-text-center">
                <img src="./assets/images/illustrations/ill-ecommerce6@2x.png" alt="" class="w-full xs-w-280">
            </div>
            <div class="row md-w-auto sm-w-auto xs-w-auto sm-mx-auto sm-justify-center xs-justify-center">
                <div class="col-12 col-sm-6 sm-py-8 md-mb-20 xs-mb-24">
                    <div class="why-card md-w-auto rounded-8 p-24 pt-28 sm-w-240 xs-w-280 xs-mx-auto xs-pr-16">
                        <div class="why-icon xs-w-48">
                            <img src="./assets/images/icons/iconspace-women-wallet.svg" alt="" class="w-full">
                        </div>
                        <div class="why-title xs-mt-24 xs-mb-10">Memiliki Stok Terbanyak</div>
                        <div class="why-desc text-opensans">
                            Kami memiliki banyak stok hingga tahun depan untuk memasok kebutuhan Anda.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 sm-py-8 md-mb-20 xs-mb-24">
                    <div class="why-card md-w-auto rounded-8 p-24 pt-28 sm-w-240 xs-w-280 xs-mx-auto xs-pr-16">
                        <div class="why-icon xs-w-48">
                            <img src="./assets/images/icons/iconspace-secure.svg" alt="" class="w-full">
                        </div>
                        <div class="why-title xs-mt-24 xs-mb-10">100% Aman</div>
                        <div class="why-desc text-opensans">
                            Anda tidak perlu khawatir saat bertransaksi di platform kami.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 sm-py-8 xs-mb-24">
                    <div class="why-card md-w-auto rounded-8 p-24 pt-28 sm-w-240 xs-w-280 xs-mx-auto xs-pr-16">
                        <div class="why-icon xs-w-48">
                            <img src="./assets/images/icons/iconspace-call-center-1.svg" alt="" class="w-full">
                        </div>
                        <div class="why-title xs-mt-24 xs-mb-10">Layanan Memuaskan</div>
                        <div class="why-desc text-opensans">
                            Jika terdapat masalah, jangan ragu untuk menghubungi kami.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 sm-py-8">
                    <div class="why-card md-w-auto rounded-8 p-24 pt-28 sm-w-240 xs-w-280 xs-mx-auto xs-pr-16">
                        <div class="why-icon xs-w-48">
                            <img src="./assets/images/icons/iconspace-delivery.svg" alt="" class="w-full">
                        </div>
                        <div class="why-title xs-mt-24 xs-mb-10">Gratis Ongkir</div>
                        <div class="why-desc text-opensans">
                            Dimanapun Anda berada, Dipastikan mendapatkan ongkir gratis.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="md-mt-80 md-mb-40 xs-my-64">
    </div>
</section>
<?php
// Load Komponen Berlangganan
include "includes/subscribe.php";
// Load Komponen Footer
include "includes/footer.php";
?>
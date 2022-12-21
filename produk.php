<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
include "includes/hero.php";
?>
<section class="landing-fashion-trending pt-140 md-py-80 sm-py-80 xs-pt-64 xs-pb-48">
    <div class="container sm-px-0 xs-px-0">
        <?php
            if(isset($_GET['kosong'])) :
        ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Buah Tidak Ditemukan!</h4>
            <p>Buah yang Anda cari tidak ditemukan dalam gudang kami</p>
        </div>
        <?php endif; ?>
        <?php
        $query = "SELECT * FROM `produk` ORDER BY `produk`.`id_produk` DESC";
        $getAllProduk = mysqli_query($connection, $query);
        $cek = mysqli_num_rows($getAllProduk);
        if($cek === 0) :
        ?>
        <div class="flex items-center justify-between mb-48 md-flex-col md-mb-56 sm-flex-col sm-mb-56 xs-flex-col">
            <div class="section-title md-mb-28 sm-mb-28 xs-mb-24 te">Tidak Ada Buah yang Dipetik</div>
        </div>
        <?php endif; ?>
        <div class="products-container">
            <?php
            $query = "SELECT * FROM `produk` ORDER BY `produk`.`id_produk` DESC";
            $getAllProduk = mysqli_query($connection, $query);
            $cek = mysqli_num_rows($getAllProduk);
            while($row = mysqli_fetch_assoc($getAllProduk)) :
            ?>
            <div class="box">
                <img src="<?= $row['url_gambar'] ?>">
                <h2><a href="detail.php?id=<?= $row['id_produk']; ?>"><?= $row['nama'] ?></a></h2>
                <h3 class="price"><?= rupiah($row['harga']) ?><span>/kg</span></h3>
                <i class='bx bx-cart-alt'></i>
            </div>
            <?php endwhile; ?>
        </div>
</section>
<?php
include "includes/subscribe.php";
include "includes/footer.php";
?>
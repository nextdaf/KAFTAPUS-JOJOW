<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
?>
</header>
<?php
if (isset($_GET['id'])):
    $id = $_GET['id'];
    $query = "SELECT * FROM `produk` WHERE `id_produk` = $id";
    $getProdukbyID = mysqli_query($connection, $query);
    $cekProduk = mysqli_num_rows($getProdukbyID);
    while ($row = mysqli_fetch_assoc($getProdukbyID)):
        $gambar = $row['url_gambar'];
        $nama = $row['nama'];
        $deskripsi = $row['deskripsi'];
        $harga = $row['harga'];
?>
<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title uppercase text-center"><?= $nama ?></h5>
        </div>
        <img src="<?= $gambar ?>"
            class="card-img-top">
        <div class="card-body">
            <p class="card-text mb-4">
                <?= $deskripsi ?>
            </p>
            <div class="dropdown-divider"></div>
            <?= rupiah($harga) ?>/kg
            <a href="order.php?id=<?= $row['id_produk'] ?>" style="line-height: inherit" class="btn btn-success float-right px-4 py-2" type="submit" name="order">Beli Sekarang</a>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php if($cekProduk === 0) : ?>
    <?php header('Location: produk.php?kosong'); ?>
<?php endif; ?>
<?php endif; ?>
<?php include "includes/footer.php"; ?>
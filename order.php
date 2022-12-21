<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
// Get Produk by ID
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $queryProduk = "SELECT * FROM `produk` WHERE `id_produk` = $id";
    $runQueryProduk = mysqli_query($connection, $queryProduk);
}

// Get Jenis Pembayaran
$queryPembayaran = "SELECT * FROM `pembayaran`";
$runQueryPembayaran = mysqli_query($connection, $queryPembayaran);
?>
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-7">
                                <h5 class="mb-3"><a href="produk.php" class="text-body">
                                        <i class="fas fa-long-arrow-alt-left me-2"></i> Lanjut Belanja</a></h5>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Shopping cart</p>
                                        <p class="mb-0">You have 4 items in your cart</p>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <?php
                                while ($produk = mysqli_fetch_assoc($runQueryProduk)):
                                    $gambar = $produk['url_gambar'];
                                    $nama = $produk['nama'];
                                    $harga = $produk['harga'];

                                    ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div>
                                                    <img src="<?= $gambar ?>" class="img-fluid rounded mr-4"
                                                        alt="Shopping item" style="width: 65px;">
                                                </div>
                                                <div class="ms-3">
                                                    <h5><?= $nama ?></h5>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <div style="width: 50px;">
                                                    <h5 class="fw-normal mb-0">2</h5>
                                                </div>
                                                <div style="width: 80px;">
                                                    <h5 class="mb-0"><?= $harga ?></h5>
                                                </div>
                                                <a href="#!" style="color: #cecece;"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="col-lg-5">

                                <div class="card bg-primary text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Pilih Jenis Pembayaran</h5>
                                        </div>
                                        <form action="konfirmasiPembayaran.php" method="POST" class="mt-4">
                                            <select name="jenisPembayaran" class="form-select" aria-label="Default select example">
                                            <?php
                                            while ($pembayaran = mysqli_fetch_assoc($runQueryPembayaran)):
                                                $idPembayaran = $pembayaran['id_pembayaran'];
                                                $jenisPembayaran = $pembayaran['nama_pembayaran'];
                                                 ?>
                                                <option class="text-uppercase" value="<?= $idPembayaran ?>"><?= $jenisPembayaran ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Subtotal</p>
                                            <p class="mb-2"><?= rupiah($harga) ?></p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Ongkir</p>
                                            <p class="mb-2">Gratis</p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Total(Termasuk Pajak)</p>
                                            <p class="mb-2"><?= rupiah($harga) ?></p>
                                        </div>

                                        <button name="submit" type="submit" class="btn btn-info btn-block btn-lg">
                                            <div class="d-flex justify-content-between">
                                                <span><?= rupiah($harga) ?></span>
                                                <span>Lanjut Pembayaran <i
                                                        class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                            </div>
                                        </button>
                                        <input type="hidden" name="idProduk" value="<?= $id ?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "includes/footer.php" ?>
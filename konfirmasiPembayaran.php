<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";

if(isset($_POST['submit'])){
    // Query Pembayaran
    $idPembayaran = $_POST['jenisPembayaran'];
    $queryPembayaran = "SELECT * FROM `pembayaran` where id_pembayaran = $idPembayaran";
    $runQueryPembayaran = mysqli_query($connection, $queryPembayaran);
    $getPembayaran = mysqli_fetch_assoc($runQueryPembayaran);
    $namaRekening = $getPembayaran['nama_pembayaran'];
    $atasNama = $getPembayaran['nama_rekening'];
    $norekening = $getPembayaran['norek'];
    $jenisPembayaran = $getPembayaran['jenis'];

    // Query Produk
    $idProduk = $_POST['idProduk'];
} else {
    header('Location: produk.php');
}
?>
</header>
<form action="orderConfirmation.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="idProduk" value="<?= $idProduk ?>">
    <input type="hidden" name="idPembayaran" value="<?= $idPembayaran ?>">
    <div class="container">
        <?php if($jenisPembayaran == "bank"): ?>
        <div class="card">
            <div class="card-body">
                <p class="card-text mb-4">
                    Silahkan Transfer ke <?= $jenisPembayaran ?> <span class="text-uppercase"><?= $namaRekening ?>
                        (<?= $norekening ?>)</span> atas nama <span class="text-uppercase"><?= $atasNama ?></span>
                </p>
                <label class="form-label" for="customFile">Upload Bukti Transfer</label>
                <input name="buktiTransfer" type="file" class="form-control" id="customFile" required />
                <p class="card-text mt-4">
                    Terima Kasih, sudah berbelanja di Jojow
                </p>
                <button name="submit" type="submit" class="btn btn-primary mt-4">Konfirmasi
                    Pembayaran</button></a>
            </div>
        </div>
        <?php else: ?>
        <div class="card">
            <div class="card-body">
                <p class="card-text mb-4">
                    Silahkan Transfer ke <span class="text-uppercase"><?= $jenisPembayaran ?></span> <span class="text-uppercase"><?= $namaRekening ?>
                        (<?= $norekening ?>)</span> atas nama <span class="text-uppercase"><?= $atasNama ?></span>
                </p>
                <label class="form-label" for="customFile">Upload Bukti Transfer</label>
                <input name="buktiTransfer" type="file" class="form-control" id="customFile" accept="image/png, image/jpeg" required />
                <p class="card-text mt-4">
                    Terima Kasih, sudah berbelanja di Jojow
                </p>
                <button name="submit" type="submit" class="btn btn-primary mt-4">Konfirmasi
                    Pembayaran</button></a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</form>
<?php include "includes/footer.php"; ?>
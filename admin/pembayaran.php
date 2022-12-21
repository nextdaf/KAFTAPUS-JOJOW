<?php
$halaman = 'pembayaran';
include "includes/header.php";
include "includes/sidebar.php";
include "includes/navigation.php";
// Get Pembayaran
$queryPembayaran = "SELECT * FROM `pembayaran`";
$getPembayaran = mysqli_query($connection, $queryPembayaran);

// Tambah Pembayaran
if(isset($_POST['tambah'])){
    $nama = $_POST['namaPembayaran'];
    $atasNama = $_POST['namaRekening'];
    $norek = $_POST['norekPembayaran'];
    $jenis = $_POST['jenisPembayaran'];
    $queryTambah = "INSERT INTO `pembayaran`(`nama_pembayaran`, `nama_rekening`, `norek`, `jenis`) VALUES ('$nama', '$atasNama','$norek','$jenis')";
    $runTambah = mysqli_query($connection, $queryTambah);
    if($runTambah){
        header('Location: pembayaran.php?berhasilTambah');
    } else {
        header('Location: pembayaran.php?gagalTambah');
    }
}

// Hapus Pembayaran
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $queryHapus = "DELETE FROM `pembayaran` WHERE `id_pembayaran` = $id";
    $terhapus = mysqli_query($connection, $queryHapus);
    if($terhapus){
        header('Location: pembayaran.php?terhapus');
    } else {
        header('Location: pembayaran.php?nterhapus');
    }
}
?>
<main style="margin-top: 58px">
    <div class="container pt-4">
        <?php if(isset($_GET['terhapus'])): ?>
        <div class="alert alert-success" role="alert">
            Pembayaran Berhasil Terhapus
        </div>
        <?php endif; ?>
        <?php if(isset($_GET['nterhapus'])): ?>
        <div class="alert alert-danger" role="alert">
            Pembayaran Gagal Terhapus
        </div>
        <?php endif; ?>
        <?php if(isset($_GET['tambah'])): ?>
        <div class="card shadow">
            <div class="card-body">
                <p class="card-text">
                <form action="" method="POST">
                    <div class="form-outline mb-4">
                        <input type="text" name="namaPembayaran" id="namaPembayaran" class="form-control" required />
                        <label class="form-label" for="namaPembayaran">Nama Pembayaran</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" name="namaRekening" id="namaRekening" class="form-control" required />
                        <label class="form-label" for="namaRekening">Nama Rekening</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" name="norekPembayaran" id="norek" class="form-control" required />
                        <label class="form-label" for="norek">No Rekening</label>
                    </div>
                    <select class="form-select mb-4" name="jenisPembayaran">
                        <option selected>Pilih Jenis Pembayaran</option>
                        <option value="bank">Bank</option>
                        <option value="ewallet">E-Wallet</option>
                    </select>
                    <button name="tambah" type="submit" class="btn btn-primary btn-block">Tambah Pembayaran</button>
                </form>
                </p>
            </div>
        </div>
        <div class="fixed-action-btn" id="fixed1">
            <a href="pembayaran.php" class="btn btn-floating text-white btn-lg btn-primary">
                <i class="fas fa-long-arrow-alt-left"></i>
            </a>
        </div>
        <?php else: ?>
        <div class="card shadow">
            <div class="card-body">
                <p class="card-text">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Nama Rekening</th>
                                <th scope="col">No. Rekening</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($pb = mysqli_fetch_assoc($getPembayaran)):
                                $idPembayaran = $pb['id_pembayaran'];
                                $namaPembayaran = $pb['nama_pembayaran'];
                                $namaRekening = $pb['nama_rekening'];
                                $noPembayaran = $pb['norek'];
                                $jenisPembayaran = $pb['jenis'];
                            ?>
                            <tr>
                                <td class="text-uppercase"><?= $namaPembayaran ?></td>
                                <td class="text-uppercase"><?= $namaRekening ?></td>
                                <td><?= $noPembayaran ?></td>
                                <td class="text-uppercase"><?= $jenisPembayaran ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="?edit=<?= $idPembayaran ?>">Edit
                                                    Pembayaran</a></li>
                                            <li><a class="dropdown-item" href="?hapus=<?= $idPembayaran ?>">Hapus
                                                    Pembayaran</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                </p>
            </div>
        </div>
        <div class="fixed-action-btn" id="fixed1">
            <a class="btn btn-floating text-white btn-lg btn-primary">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <ul class="list-unstyled">
                <li>
                    <a href="?tambah" class="btn text-white btn-floating btn-lg btn-success">
                        <i class="fas fa-plus"></i>
                    </a>
                </li>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</main>
<?php include "includes/footer.php"; ?>
<?php
$halaman = 'orders';
include "includes/header.php";
include "includes/sidebar.php";
include "includes/navigation.php";

// Get Orders Pending
$queryPending = "SELECT o.id_orders, o.id_pembayaran, o.id_users, o.id_produk, p.nama_pembayaran, u.nama_lengkap, produk.nama as nama_buah, o.bukti_transfer, o.tanggal_pembelian, o.status FROM `orders` as o JOIN pembayaran as p ON o.id_pembayaran = p.id_pembayaran JOIN users as u ON o.id_users = u.id_users JOIN produk ON o.id_produk = produk.id_produk WHERE o.status = 'pending'";
$runQueryPending = mysqli_query($connection, $queryPending);

// Get Orders Ditolak
$queryDitolak = "SELECT o.id_orders, o.id_pembayaran, o.id_users, o.id_produk, p.nama_pembayaran, u.nama_lengkap, produk.nama as nama_buah, o.bukti_transfer, o.tanggal_pembelian, o.status FROM `orders` as o JOIN pembayaran as p ON o.id_pembayaran = p.id_pembayaran JOIN users as u ON o.id_users = u.id_users JOIN produk ON o.id_produk = produk.id_produk WHERE o.status = 'ditolak'";
$runQueryDitolak = mysqli_query($connection, $queryDitolak);

$base_url = 'https://' . $_SERVER['SERVER_NAME'] . '/tugasakhir/';

// Tolak Produk
if(isset($_GET['tolak'])){
    $id_order = $_GET['tolak'];
    $queryTolak = "UPDATE `orders` SET `status` = 'ditolak' WHERE `orders`.`id_orders` = $id_order";
    $runQueryTolak = mysqli_query($connection, $queryTolak);
    if($runQueryTolak){
        header('Location: orders.php?suksesTolak');
    } else {
        header('Location: orders.php?gagalTolak');
    }
}
?>
<main style="margin-top: 58px">
    <div class="container pt-4">
        <?php if(isset($_GET['suksesTolak'])): ?>
        <div class="alert alert-success" role="alert">
            Pesanan Berhasil Ditolak
            <a href="orders.php"><button type="button" class="close float-end" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></a>
        </div>
        <?php endif; ?>
        <div class="card shadow">
            <div class="card-header text-uppercase text-center">Orderan Dengan Status Pending</div>
            <div class="card-body">
                <p class="card-text">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Nama Pembeli</th>
                                <th scope="col">Produk Dibeli</th>
                                <th scope="col">Bukti TF</th>
                                <th scope="col">Tanggal Pembelian</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($getPending = mysqli_fetch_assoc($runQueryPending)):
                                $id_order = $getPending['id_orders'];
                                $id_produk = $getPending['id_produk'];
                                $nama_pembeli = $getPending['nama_lengkap'];
                                $nama_buah = $getPending['nama_buah'];
                                $buktiTF = $getPending['bukti_transfer'];
                                $tanggal_pembelian = $getPending['tanggal_pembelian'];
                                $status = $getPending['status'];
                            ?>
                            <tr>
                                <td><?= $nama_pembeli ?></td>
                                <td><a target="_blank" href="../detail.php?id=<?= $id_produk ?>"><?= $nama_buah ?></a>
                                </td>
                                <td><a target="_blank" href="<?= $base_url.$buktiTF ?>">Lihat</td>
                                <td><?= $tanggal_pembelian ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                                            <?= $status ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#">Kirim</a></li>
                                            <li><a class="dropdown-item" href="?tolak=<?= $id_order ?>">Tolak</a></li>
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
        <div class="card mt-4 shadow">
            <div class="card-header text-uppercase text-center">Orderan Dengan Status Ditolak</div>
            <div class="card-body">
                <p class="card-text">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Nama Pembeli</th>
                                <th scope="col">Produk Dibeli</th>
                                <th scope="col">Bukti TF</th>
                                <th scope="col">Tanggal Pembelian</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($getDitolak = mysqli_fetch_assoc($runQueryDitolak)):
                                $id_order = $getDitolak['id_orders'];
                                $id_produk = $getDitolak['id_produk'];
                                $nama_pembeli = $getDitolak['nama_lengkap'];
                                $nama_buah = $getDitolak['nama_buah'];
                                $buktiTF = $getDitolak['bukti_transfer'];
                                $tanggal_pembelian = $getDitolak['tanggal_pembelian'];
                                $status = $getDitolak['status'];
                            ?>
                            <tr>
                                <td><?= $nama_pembeli ?></td>
                                <td><a target="_blank" href="../detail.php?id=<?= $id_produk ?>"><?= $nama_buah ?></a>
                                </td>
                                <td><a target="_blank" href="<?= $base_url.$buktiTF ?>">Lihat</td>
                                <td><?= $tanggal_pembelian ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-danger" type="button">
                                            <?= $status ?>
                                        </button>
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
    </div>
</main>
<?php include "includes/footer.php"; ?>
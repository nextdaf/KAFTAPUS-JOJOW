<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
if(!isset($_SESSION['id'])){
    header('Location: login.php?dibutuhkan');
}
$id = $_SESSION['id'];
$queryOrders = "SELECT produk.nama, produk.harga, pembayaran.nama_pembayaran, orders.status FROM `orders` JOIN produk ON orders.id_produk = produk.id_produk JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE `id_users` = $id";
$runQueryOrders = mysqli_query($connection, $queryOrders);
?>
</header>
<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Pembayaran</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($getOrders = mysqli_fetch_assoc($runQueryOrders)):
                            $nama = $getOrders['nama'];
                            $harga = $getOrders['harga'];
                            $pembayaran = $getOrders['nama_pembayaran'];
                            $status = $getOrders['status'];
                        ?>
                        <tr>
                            <td><?= $nama ?></th>
                            <td><?= rupiah($harga) ?></td>
                            <td><?= $pembayaran ?></td>
                            <td class="text-uppercase <?php if($status == "ditolak") echo 'btn-danger'?> <?php if($status == "pending") echo 'btn-secondary'?> <?php if($status == "terkirim") echo 'btn-success'?>"><?= $status ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
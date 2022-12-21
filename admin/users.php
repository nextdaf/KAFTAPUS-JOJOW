<?php
$halaman = 'users';
include "includes/header.php";
include "includes/sidebar.php";
include "includes/navigation.php";
?>
<?php
    $query = "SELECT * FROM `users`";
    $getKustomer = mysqli_query($connection, $query);
    $cekKustomer = mysqli_num_rows($getKustomer);
?>
<main style="margin-top: 58px">
    <div class="container pt-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>List Pengguna</h4>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <?php if($cekKustomer == 0): ?>
                <h1>Tidak Ada Data Kustomer</h1>
                <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No. HP</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($getKustomer)):
                            $namalengkap = $row['nama_lengkap'];
                            $alamat = $row['alamat'];
                            $no_hp = $row['no_hp'];
                    ?>
                        <tr>
                            <td><?= $namalengkap ?></td>
                            <td><?= $alamat ?></td>
                            <td><?= $no_hp ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
                <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
</main>
<?php include "includes/footer.php"; ?>
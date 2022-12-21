<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
?>
<div class="container">
    <?php if(isset($_GET['gagal'])): ?>
    <button type="button" class="btn btn-danger mb-2" style="width: 100%">Email atau Password Anda Salah</button>
    <?php endif; ?>
    <?php if(isset($_GET['terdaftar'])): ?>
    <button type="button" class="btn btn-success mb-2" style="width: 100%">Pendaftaran Berhasil Silahkan Masuk</button>
    <?php endif; ?>
    <?php if(isset($_GET['dibutuhkan'])): ?>
    <button type="button" class="btn btn-danger mb-2 uppercase" style="width: 100%">Masuk Terlebih Dahulu Sebelum Melakukan Pembelian</button>
    <?php endif; ?>
    <?php if(isset($_GET['terlarang'])): ?>
    <button type="button" class="btn btn-danger mb-2 uppercase" style="width: 100%">Hanya Admin yang dapat mengakses halaman Admin</button>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <h4 class="uppercase">Masuk</h4>
        </div>
        <div class="card-body">
            <form action="includes/ceklogin.php" method="POST">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <button name="masuk" type="submit" class="btn btn-primary uppercase" style="width: 100%;">Masuk</button>
            </form>
            <p class="text-center mt-4">Belum punya akun jojow? <a href="daftar.php">Daftar</a></p>
        </div>
    </div>
</div>
<?php include "includes/footer.php";
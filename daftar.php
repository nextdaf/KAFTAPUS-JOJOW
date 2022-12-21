<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="uppercase">Daftar</h4>
        </div>
        <div class="card-body">
            <form action="includes/cekdaftar.php" method="POST">
                <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input name="namaLengkap" type="text" class="form-control" id="namaLengkap"
                        aria-describedby="namaLengkapHelp" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="no_hp">No. Handphone</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input type="number" class="form-control" name="nomorhp" id="no_hp" placeholder="No. Handphone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea class="form-control" name="alamat" required></textarea>
                </div>
                <button name="daftar" type="submit" class="btn btn-primary uppercase"
                    style="width: 100%;">Daftar</button>
            </form>
            <p class="text-center mt-4">Sudah Punya Akun Jojow? <a href="login.php">Masuk</a></p>
        </div>
    </div>
</div>
<?php include "includes/footer.php";
<?php
include "includes/header.php";
include "includes/sidebar.php";
include "includes/navigation.php";
if(!$_SESSION['email']){
    header('Location: ../login.php?terlarang');
}
?>
<?php
$id = $_SESSION['id'];
$user = "SELECT users.nama_lengkap, users.alamat, users.no_hp, users_login.email FROM `users` JOIN users_login ON users.id_users = users_login.id_users WHERE users.id_users = $id";
$getUser = mysqli_query($connection, $user);
$userProfile = mysqli_fetch_assoc($getUser);
$nama = $userProfile['nama_lengkap'];
$alamat = $userProfile['alamat'];
$hp = $userProfile['no_hp'];
$email = $userProfile['email'];

// Update Profil
if(isset($_POST['submit'])){
$uNama = $_POST['nama'];
$uEmail = $_POST['email'];
$uPassword = $_POST['password'];
$uPhone = $_POST['hp'];
$uAlamat = $_POST['alamat'];
$queryUpdateUsers = "UPDATE `users` SET `nama_lengkap`= '$uNama',`alamat`= '$uAlamat',`no_hp`= '$uPhone' WHERE `id_users` = '$id'";
$runUpdateUsers = mysqli_query($connection, $queryUpdateUsers);
    header('Location: profile.php');
}
?>
<main style="margin-top: 58px">
    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?= $nama ?></h5>
                    </div>
                </div>
            </div>
            <?php if(isset($_GET['edit'])): ?>
            <div class="col-lg-8">
                <form action="" method="POST">
                    <div class="card mb-4">
                        <button name="submit" type="submit" class="btn btn-primary">Simpan</button></a>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" placeholder="<?= $nama ?>" />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" placeholder="<?= $email ?>" readonly/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="hp" class="form-control" placeholder="<?= $hp ?>" />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="alamat" class="form-control"
                                        placeholder="<?= $alamat ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php else: ?>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <a href="?edit"><button type="button" class="btn btn-primary">Edit Informasi</button></a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $nama ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $email ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $hp ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $alamat ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php include "includes/footer.php"; ?>
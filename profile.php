<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
if(isset($_GET['id'])){
$id = $_GET['id'];
$queryUser = "SELECT * FROM `users_login` JOIN users ON users_login.id_users = users.id_users WHERE id_login = $id";
$runQueryUser = mysqli_query($connection, $queryUser);
$getUser = mysqli_fetch_assoc($runQueryUser);
$getUserID = $getUser['id_login'];
$getUserEmail = $getUser['email'];
$getNamaLengkap = $getUser['nama_lengkap'];
$getUserAlamat = $getUser['alamat'];
$getNoHp = $getUser['no_hp'];
$getUrlPhotoProfile = $getUser['url_profil'];
 if(is_null($getUserID)){
        header('Location: index.php');
 }
}
if(isset($_POST['simpan'])){
    $id = $_GET['edit'];
    $queryUser = "SELECT * FROM `users_login` JOIN users ON users_login.id_users = users.id_users WHERE id_login = $id";
    $runQueryUser = mysqli_query($connection, $queryUser);
    $getUser = mysqli_fetch_assoc($runQueryUser);
    $getUserID = $getUser['id_users'];
    $nama_lengkap = $_POST['userNamaLengkap'];
    $no_hp = $_POST['userNoHp'];
    $alamat = $_POST['userAlamat'];
    $queryEdit = "UPDATE `users` SET `nama_lengkap`='$nama_lengkap',`alamat`='$alamat',`no_hp`='$no_hp' WHERE `id_` = $getUserID";
    $runQueryEdit = mysqli_query($connection, $queryEdit);
    if($runQueryEdit){
        header('Location: profile.php?id='.$id);
    }
}
if(isset($_POST['empas'])){
    $id = $_GET['edit'];
    $editEmail = $_POST['userLoginEmail'];
    $editPassword = $_POST['userLoginPassword'];
    $queryEdit = "UPDATE `users_login` SET `email`='$editEmail',`password`='$editPassword' WHERE `id_login` = $id";
    $runQueryEdit = mysqli_query($connection, $queryEdit);
    if($runQueryEdit){
        header('Location: profile.php?id='.$id);
    }
}
if(isset($_POST['editPhotoProfile'])){
    $id = $_GET['edit'];
    $queryUser = "SELECT * FROM `users_login` JOIN users ON users_login.id_users = users.id_users WHERE id_login = $id";
    $runQueryUser = mysqli_query($connection, $queryUser);
    $getUser = mysqli_fetch_assoc($runQueryUser);
    $getUserID = $getUser['id_users'];
    $getNamaLengkap = $getUser['nama_lengkap'];
    $namaFile = $_FILES['fileProfil']['name'];
    $ekstensiFile = explode(".", $namaFile);
    $namaSementara = $_FILES['fileProfil']['tmp_name'];
    if(!file_exists('assets/profil/'.$getNamaLengkap)) {
        mkdir('assets/profil/'.$getNamaLengkap, 0777, true);
    }
    $newfilename = $getNamaLengkap . '.' . end($ekstensiFile);
    $dirUpload = "assets/profil/".$getNamaLengkap."/";
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$newfilename);
    $namaFileDB = $dirUpload . $newfilename;
    $queryProfil = "UPDATE `users` SET `url_profil`= '$namaFileDB' WHERE `id_users` = $getUserID";
    $runQueryProfil = mysqli_query($connection, $queryProfil);
    if($runQueryProfil){
        header('Location: profile.php?id='.$id);
    }
}
?>
<div class="container">
    <?php
    if(isset($_GET['edit'])):
        $id = $_GET['edit'];
        $queryUser = "SELECT * FROM `users_login` JOIN users ON users_login.id_users = users.id_users WHERE id_login = $id";
        $runQueryUser = mysqli_query($connection, $queryUser);
        $getUser = mysqli_fetch_assoc($runQueryUser);
        $getUserID = $getUser['id_login'];
        $getUserEmail = $getUser['email'];
        $getNamaLengkap = $getUser['nama_lengkap'];
        $getUserAlamat = $getUser['alamat'];
        $getNoHp = $getUser['no_hp'];
        $getUrlPhotoProfile = $getUser['url_profil'];
    ?>
    <div class="card">
        <div class="card-header">
            <div class="float-left">Profil <?= $getNamaLengkap ?></div>
            <div class="float-right"><a href="profile.php?id=<?= $getUserID ?>"><i class="fa fa-arrow-left"> Kembali ke
                        Informasi Profil</i></a></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php if(isset($getUrlPhotoProfile)): ?>
                        <img src="<?= $getUrlPhotoProfile ?>" class="img-thumbnail border-0"
                            style="border-radius: 10px !important;">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="fileProfil" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01" accept="image/png, image/jpeg">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                            </div>
                        </div>
                        <button name="editPhotoProfile" type="submit" class="btn btn-primary" style="width: 100%">Simpan
                            Perubahan</button>
                        <?php else : ?>
                        <img src="assets/images/dummy-avatar.png" class="img-thumbnail border-0"
                            style="border-radius: 10px !important;">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="fileProfil" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01" accept="image/png, image/jpeg">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                            </div>
                        </div>
                        <button name="editPhotoProfile" type="submit" class="btn btn-primary" style="width: 100%">Simpan
                            Perubahan</button>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="col">
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <input type="email" name="userLoginEmail" class="form-control"
                                placeholder="<?= $getUserEmail ?>" readonly>
                        </div>
                        <button data-toggle="modal" data-target="#modalEmailPassword" type="button"
                            class="btn btn-primary mb-4" style="width: 100%">Edit Email dan
                            Password</button>
                        <div class="input-group mb-3">
                            <input type="text" name="userNamaLengkap" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="userNoHp" class="form-control" placeholder="Nomor Hp">
                        </div>
                        <div class="input-group">
                            <textarea class="form-control" name="userAlamat" placeholder="Alamat Lengkap"></textarea>
                        </div>
                        <button name="simpan" type="submit" class="btn btn-primary mt-4 float-right">Simpan
                            Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="card">
        <div class="card-header">
            <div class="float-left">Profil <?= $getNamaLengkap ?></div>
            <div class="float-right"><a href="?edit=<?= $getUserID ?>">Edit</a></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <?php if(isset($getUrlPhotoProfile)): ?>
                    <img src="<?= $getUrlPhotoProfile ?>" class="img-thumbnail border-0"
                        style="border-radius: 10px !important;">
                    <?php else : ?>
                    <img src="assets/images/dummy-avatar.png" class="img-thumbnail border-0"
                        style="border-radius: 10px !important;">
                    <?php endif; ?>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="email" name="userLoginEmail" class="form-control"
                            placeholder="<?= $getUserEmail ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="userNamaLengkap" class="form-control"
                            placeholder="<?= $getNamaLengkap ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="userNoHp" class="form-control" placeholder="<?= $getNoHp ?>" readonly>
                    </div>
                    <div class="input-group">
                        <textarea class="form-control" placeholder="<?= $getUserAlamat ?>" readonly></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<div class="modal fade" id="modalEmailPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" name="userLoginEmail" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="userLoginPassword" class="form-control" placeholder="Password"
                            required>
                    </div>
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                    <button name="empas" type="submit" class="btn btn-success float-right">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
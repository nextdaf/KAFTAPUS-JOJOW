<?php
// Load Komponen DB
include "db.php";
session_start();
if(isset($_POST['daftar'])){
    $namaLengkap = $_POST['namaLengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nomorhp = $_POST['nomorhp'];
    $alamat = $_POST['alamat'];

    $query_users = "INSERT INTO `users`(`id_users`, `nama_lengkap`, `alamat`, `no_hp`) VALUES ('','$namaLengkap','$alamat','$nomorhp')";
    $insert_users = mysqli_query($connection, $query_users);
    if(!$insert_users){
        die('Query Failed' . mysqli_error($connection));
    } else {
        $justGetUsers = "SELECT * FROM `users` WHERE `nama_lengkap` = '$namaLengkap'";
        $getUsersbyName = mysqli_query($connection, $justGetUsers);
        while($row = mysqli_fetch_assoc($getUsersbyName)){
            $id_users = $row['id_users'];
        }
        $query_login = "INSERT INTO `users_login`(`id_login`, `id_users`, `email`, `password`, `role`) VALUES ('','$id_users','$email','$password','kustomer')";
        $insert_login = mysqli_query($connection, $query_login);
        if(!$insert_login){
            die('Query Failed ' . mysqli_error($connection));
        } else {
            header('Location: ../login.php?terdaftar');
        }
    }
}
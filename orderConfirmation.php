<?php
include "includes/db.php";
include "admin/functions.php";
session_start();
if(empty($_SESSION['id'])){
    header('Location: login.php?dibutuhkan');
}
// Query User
$idUser = $_SESSION['id'];
$queryUser = "SELECT u.nama_lengkap, u.alamat, u.no_hp FROM users as u JOIN users_login as ul WHERE ul.id_login = $idUser";
$runQueryUser = mysqli_query($connection, $queryUser);
$getUser = mysqli_fetch_assoc($runQueryUser);
$namaUser = $getUser['nama_lengkap'];
$alamat = $getUser['alamat'];
$nohp = $getUser['no_hp'];

// Query Produk
$idProduk = $_POST['idProduk'];
$queryProduk = "SELECT * FROM `produk` WHERE `id_produk` = $idProduk";
$runQueryProduk = mysqli_query($connection, $queryProduk);
$getProduk = mysqli_fetch_assoc($runQueryProduk);
$namaBuah = $getProduk['nama'];
$hargaBuah = $getProduk['harga'];

// Query Pembayaran
$idPembayaran = $_POST['idPembayaran'];
$queryPembayaran = "SELECT * FROM `pembayaran`";
$runQueryPembayaran = mysqli_query($connection, $queryPembayaran);
$getPembayaran = mysqli_fetch_assoc($runQueryPembayaran);
$namaPembayaran = $getPembayaran['nama_pembayaran'];

// Upload File
$namaFile = $_FILES['buktiTransfer']['name'];
$ekstensiFile = explode(".", $namaFile);
$namaSementara = $_FILES['buktiTransfer']['tmp_name'];
if(!file_exists('bukti/'.$namaUser)) {
    mkdir('bukti/'.$namaUser, 0777, true);
}
$newfilename = $namaUser . '_bukti_transfer.' . end($ekstensiFile);
$dirUpload = "bukti/".$namaUser."/";
$terupload = move_uploaded_file($namaSementara, $dirUpload.$newfilename);
$namaFileDB = $dirUpload . $newfilename;
$tanggalSekarang = date("Y-m-d H:i:s");

// Save to TB Orders
$queryInsert = "INSERT INTO `orders`(`id_pembayaran`, `id_users`, `id_produk`, `bukti_transfer`, `tanggal_pembelian`, `status`) VALUES ('$idPembayaran','$idUser','$idProduk','$namaFileDB','$tanggalSekarang','pending')";
$insert = mysqli_query($connection, $queryInsert);
$base_url = 'https://' . $_SERVER['SERVER_NAME'] . '/tugasakhir/';
// Konfirmasi Pembayaran
$break = urlencode("\n");
    $pesan = "KONFIRMASI PEMBELIAN" . $break . "====================== " . $break . " -------------- " . $break . " PRODUK " . $break . " -------------- " . $break . " " . $namaBuah . " " . $break . " " . $break . " ---------------------- " . $break . " PENGIRIMAN " . $break . " ---------------------- " . $break . " Nama Lengkap : " . $namaUser . " " . $break . " Alamat Lengkap : " . $alamat . " " . $break . " Nomor Handphone : " . $nohp . " " . $break . " " . $break .  " ---------------------- " . $break . "PEMBAYARAN" . $break . "----------------------" . $break . "Metode Pembayaran: " . $namaPembayaran . $break . "Bukti Transfer: " . $base_url . $namaFileDB . $break . $break . " ----------- " . $break . " TOTAL " . $break . " ----------- " . $break . " " . rupiah($hargaBuah) . "/kg";
    header("Location: https://api.whatsapp.com/send?phone=6282139782160&text=$pesan");
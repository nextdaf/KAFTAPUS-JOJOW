<?php
function getTotalProduk(){
    global $connection;
    $query = "SELECT * FROM `produk`";
    $produk = mysqli_query($connection, $query);
    $totalProduk = mysqli_num_rows($produk);
    echo '<h5 class="card-title text-center">'.$totalProduk.'</h5>';
}
function getTotalStok(){
    global $connection;
    $query = "SELECT SUM(stok) as totalStok FROM produk";
    $stok = mysqli_query($connection, $query);
    $totalStok = mysqli_fetch_assoc($stok);
    echo '<h5 class="card-title text-center">'.$totalStok['totalStok'].'</h5>';
}
function tambahProduk(){
    global $connection;
    if(isset($_POST['submit'])){
        $url_gambar = $_POST['url_gambar'];
        $namaProduk = $_POST['namaProduk'];
        $deskripsiProduk = $_POST['deskripsiProduk'];
        $hargaProduk = $_POST['hargaProduk'];
        $stokProduk = $_POST['stokProduk'];

        $query_produk = "INSERT INTO `produk`(`id_produk`, `nama`, `deskripsi`, `harga`, `stok`, `url_gambar`) VALUES ('','".$namaProduk."','".$deskripsiProduk."','".$hargaProduk."','".$stokProduk."','".$url_gambar."')";
            $insert_query_produk = mysqli_query($connection, $query_produk);
            if(!$insert_query_produk){
                die('Query Failed' . mysqli_error($connection));
            } else {
                header('Location: produk.php');
            }
    }
}

function editProduk(){
    global $connection;
    if(isset($_GET['edit'])){
        if(isset($_POST['edit'])){
        $id = $_GET['edit'];
        $gambar = $_POST['url_gambar'];
        $namaProduk = $_POST['namaProduk'];
        $deskripsiProduk = $_POST['deskripsiProduk'];
        $hargaProduk = $_POST['hargaProduk'];
        $stokProduk = $_POST['stokProduk'];

        $query = "UPDATE `produk` SET `nama`='$namaProduk',`deskripsi`='$deskripsiProduk',`harga`='$hargaProduk',`stok`='$stokProduk',`url_gambar`='$gambar' WHERE `id_produk` = $id";
        $edit_produk = mysqli_query($connection, $query);
        if(!$edit_produk){
            die('Query Failed' . mysqli_error($connection));
        } else {
            header("Location: produk.php");
        }
        }
    }
}

function hapusProduk(){
    global $connection;
    if(isset($_GET['hapus'])){
        $idProduk = $_GET['hapus'];
        $query = "DELETE FROM `produk` WHERE `id_produk` = $idProduk";
        $hapusProduk = mysqli_query($connection, $query);
        header("Location: produk.php");
        }
}

function tambahNav(){
    global $connection;
    if(isset($_POST['submit'])){
        $judul = $_POST['judulNav'];
        $link = $_POST['linkNav'];

        $query = "INSERT INTO `navigation`(`id_nav`, `title_nav`, `link`) VALUES ('','$judul','$link')";
        $insert_nav = mysqli_query($connection, $query);
        if(!$insert_nav){
            die('Query Failed' . mysqli_error($connection));
        } else {
            header("Location: navigasi.php");
        }
    }
}

function hapusNav(){
    global $connection;
    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];
        $query = "DELETE FROM `navigation` WHERE `id_nav` = $id";
        $hapus_nav = mysqli_query($connection, $query);
        header("Location: navigasi.php");
    }
}

function editNav()
{
    global $connection;
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        if (isset($_POST['edit'])) {
            $judul = $_POST['judulNav'];
            $link = $_POST['linkNav'];
            $query = "UPDATE `navigation` SET `title_nav`='$judul',`link`='$link' WHERE `id_nav` = $id";
            $update_nav = mysqli_query($connection, $query);
            if (!$update_nav) {
                die('Query Failed' . mysqli_error($connection));
            } else {
                header("Location: navigasi.php");
            }
        }
    }
}
function rupiah($angka){
	$hasil_rupiah = "Rp" . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function base_url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      $_SERVER['REQUEST_URI']
    );
  }
?>
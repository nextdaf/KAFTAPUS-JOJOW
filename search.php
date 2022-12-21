<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
include "includes/hero.php";
?>
<?php
if(isset($_POST['submit'])){
    $search = $_POST['search'];
    $query = "SELECT * FROM `produk` WHERE nama LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);

    if(!$search_query){
        die("Query Failed" . mysqli_error($connectionn));
      }

      $count = mysqli_num_rows($search_query);
}
?>
<?php if(!$count == 0): ?>
<section class='landing-fashion-trending pt-140 md-py-80 sm-py-80 xs-pt-64 xs-pb-48'>
    <div class='container sm-px-0 xs-px-0'>
        <div class='flex items-center justify-between mb-48 md-flex-col md-mb-56 sm-flex-col sm-mb-56 xs-flex-col'>
            <div class='section-title md-mb-28 sm-mb-28 xs-mb-24 te'>Hasil Pencarian untuk <?= $search ?></div>
        </div>
        <div class='products-container'>
            <?php endif; ?>
            <?php
        if(isset($_POST['submit'])){
          $search = $_POST['search'];
          $query = "SELECT * FROM `produk` WHERE nama LIKE '%$search%'";
          $search_query = mysqli_query($connection, $query);

          if(!$search_query){
            die("Query Failed" . mysqli_error($connectionn));
          }

          $count = mysqli_num_rows($search_query);

          if($count == 0){
            echo
            "
            <div class='container sm-px-0 xs-px-0'>
            <div class='flex items-center justify-between mb-48 md-flex-col md-mb-56 sm-flex-col sm-mb-56 xs-flex-col'>
            <div class='section-title md-mb-28 sm-mb-28 xs-mb-24 te'>Tidak Ada Hasil Pencarian untuk ". $search ."</div>
            </div>
            </div>
            ";
          } else {
            $query_produk = "SELECT * FROM `produk`";
            $getAllProduk = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($getAllProduk)){
                echo "
                <div class='box'>
                <img src=".$row['url_gambar'].">
                <h2>". $row['nama'] ."</h2>
                <h3 class='price'>". $row['harga'] ."<span>/kg</span></h3>
                <i class='bx bx-cart-alt'></i>
                </div>
                ";
            }
          }
        }
    ?>
        </div>
    </div>
</section>
<?php
include "includes/subscribe.php";
include "includes/footer.php";
?>
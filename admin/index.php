<?php
$halaman = 'index';
include "includes/header.php";
include "includes/sidebar.php";
include "includes/navigation.php";
?>
<main style="margin-top: 58px">
    <div class="container pt-4">
        <section class="mb-4">
            <div class="row mb-4">
                <div class="col-6 col-sm-4">
                    <div class="card">
                        <div class="card-header text-center"><h4>Total Produk</h4></div>
                        <div class="card-body">
                            <p class="card-text text-center">
                                <?php getTotalProduk(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4">
                    <div class="card">
                        <div class="card-header text-center"><h4>Total Stok</h4></div>
                        <div class="card-body">
                            <p class="card-text text-center">
                                <?php getTotalStok(); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
<?php include "includes/footer.php"; ?>
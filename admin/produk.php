<?php
$halaman = 'produk';
include "includes/header.php";
include "includes/sidebar.php";
include "includes/navigation.php";
?>
<?php hapusProduk() ?>
<main style="margin-top: 58px">
    <div class="container pt-4">
        <div class="h-100 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-primary mb-4" data-mdb-toggle="modal" data-mdb-target="#tambahProduk">
                Tambah Produk
            </button>

            <!-- Modal -->
            <div class="modal top fade" id="tambahProduk" tabindex="-1" aria-labelledby="tambahProdukModal"
                aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                <div class="modal-dialog modal-xl ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php tambahProduk();?>" method="POST">
                                <div class="form-outline mb-4">
                                    <input type="url" name="url_gambar" id="url_gambar" class="form-control"
                                        placeholder="" required />
                                    <label class="form-label" for="url_gambar">URL Gambar</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" name="namaProduk" id="namaProduk" class="form-control"
                                        required />
                                    <label class="form-label" for="namaProduk">Nama Produk</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <textarea class="form-control" name="deskripsiProduk" id="deskripsiProduk" rows="4"
                                        required></textarea>
                                    <label class="form-label" for="deskripsiProduk">Deskripsi Produk</label>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="number" name="hargaProduk" id="hargaProduk"
                                                class="form-control" required />
                                            <label class="form-label" for="hargaProduk">Harga</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="number" name="stokProduk" id="stokProduk" class="form-control"
                                                required />
                                            <label class="form-label" for="stokProduk">Stok</label>
                                        </div>
                                    </div>
                                </div>
                                <button name="submit" type="submit" class="btn btn-primary btn-block">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header">Semua Produk</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $query = "SELECT * FROM `produk` ORDER BY `produk`.`id_produk` DESC";
                        $getAllProduk = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($getAllProduk)):
                            $idProduk = $row['id_produk'];
                            $namaProduk = $row['nama'];
                            $deskripsiProduk = $row['deskripsi'];
                            $hargaProduk = $row['harga'];
                            $stokProduk = $row['stok'];
                            $gambarProduk = $row['url_gambar'];
                        ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $gambarProduk ?>" alt="" style="width: 45px; height: 45px"
                                            class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?= $namaProduk ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?= $deskripsiProduk ?></p>
                                </td>
                                <td><?= $hargaProduk ?></td>
                                <td><?= $stokProduk ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary dropdown-toggle" type="button"
                                        id="dropdownAksi" data-mdb-toggle="dropdown" aria-expanded="false">
                                        Edit
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownAksi">
                                        <li><a class="dropdown-item" href="produk.php?edit=<?= $idProduk ?>">Edit
                                                Produk</a></li>
                                        <li><a class="dropdown-item" href="produk.php?hapus=<?= $idProduk ?>">Hapus
                                                Produk</a></li>
                                    </ul>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        if (isset($_GET['edit'])):
            $id = $_GET['edit'];
            $query = "SELECT * FROM `produk` WHERE `id_produk` = $id";
            $getProduk = mysqli_query($connection, $query);
            $singleProduk = mysqli_fetch_assoc($getProduk);
            $nama = $singleProduk['nama'];
        ?>
        <div class="card mt-4">
            <div class="card-header">Edit Produk <?php echo $nama ?></div>
            <div class="card-body">
                <p class="card-text">
                <form action="<?php editProduk();?>" method="POST">
                    <div class="form-outline mb-4">
                        <input type="url" name="url_gambar" id="url_gambar" class="form-control" placeholder=""
                            required />
                        <label class="form-label" for="url_gambar">URL Gambar</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="namaProduk" id="namaProduk" class="form-control" required />
                        <label class="form-label" for="namaProduk">Nama Produk</label>
                    </div>

                    <div class="form-outline mb-4">
                        <textarea class="form-control" name="deskripsiProduk" id="deskripsiProduk" rows="4"
                            required></textarea>
                        <label class="form-label" for="deskripsiProduk">Deskripsi Produk</label>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" name="hargaProduk" id="hargaProduk" class="form-control"
                                    required />
                                <label class="form-label" for="hargaProduk">Harga</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" name="stokProduk" id="stokProduk" class="form-control" required />
                                <label class="form-label" for="stokProduk">Stok</label>
                            </div>
                        </div>
                    </div>
                    <button name="edit" type="submit" class="btn btn-primary btn-block">Edit</button>
                </form>
                </p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</main>
<?php include "includes/footer.php"; ?>
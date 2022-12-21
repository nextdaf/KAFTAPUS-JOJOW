<?php
include "db.php";
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a href="#" class="navbar-brand text-black uppercase" href="./">
            Jojow
        </a>
        <button class="navbar-toggler border-none" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <img src="./assets/images/icons/ic-menu.svg" alt="" />
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="close-button">
                    <button class="navbar-toggler border-none" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="true" aria-label="Toggle navigation">
                        <img src="./assets/images/icons/ic-close.svg" alt="" />
                    </button>
                </li>
                <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>

                <!-- <li class="nav-item"><a class="btn btn-outline-primary" href="login.php">
                    
                </a>
                </li> -->
                <?php if (isset($_SESSION['email'])): ?>
                <li class="nav-item"><a class="nav-link" href="profile.php?id=<?= $_SESSION['id'] ?>">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="orders.php?id=<?= $_SESSION['id'] ?>">Lacak Pesanan</a></li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="includes/logout.php">
                        Keluar
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="login.php">
                        Masuk | Daftar
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php if(isset($_GET['dilarang'])) : ?>
<div class="container">
    <button type="button" class="btn btn-danger mb-4 uppercase" style="width: 100%">hanya admin yang dapat mengakses
        halaman admin!</button>
</div>
<?php endif; ?>
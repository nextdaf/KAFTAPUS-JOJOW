<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="/tugasakhir/admin" class="list-group-item list-group-item-action py-2 ripple <?php if($halaman == 'index') echo 'active'?>">
                <span>Main dashboard </span>
            </a>
            <a href="produk.php" class="list-group-item list-group-item-action py-2 ripple <?php if($halaman == 'produk') echo 'active'?>">
                <span>Produk</span>
            </a>
            <a href="users.php" class="list-group-item list-group-item-action py-2 ripple <?php if($halaman == 'users') echo 'active'?>">
                <span>Users</span>
            </a>
            <a href="pembayaran.php" class="list-group-item list-group-item-action py-2 ripple <?php if($halaman == 'pembayaran') echo 'active'?>">
                <span>Pembayaran</span>
            </a>
            <a href="orders.php" class="list-group-item list-group-item-action py-2 ripple <?php if($halaman == 'orders') echo 'active'?>">
                <span>Orders</span>
            </a>
        </div>
    </div>
</nav>
<?php

include('function/view-query.php');

$transaksi = getTrans();
$count = mysqli_num_rows($transaksi);
$totalTransaksi = 0;

foreach ($transaksi as $key => $value) {
    $totalTransaksi += $value['total_bayar'];
}

$kategori = getCategory();
$countKategori = mysqli_num_rows($kategori);

$menu = getMenu();
$countMenu = mysqli_num_rows($menu);

$user = getUser($_SESSION['hak'], $_SESSION['id_user']);
$countUser = mysqli_num_rows($user);

$meja = getMejaa();
$countMeja = mysqli_num_rows($meja);
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- User Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card `user`-card">

                            <div class="card-body">
                                <h5 class="card-title">User</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $countUser ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End User Card -->

                    <!-- Meja Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card meja-card">

                            <div class="card-body">
                                <h5 class="card-title">Meja</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bar-chart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $countMeja ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Meja Card -->

                    <!-- Kategori Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card kategori-card">

                            <div class="card-body">
                                <h5 class="card-title">Kategori</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bar-chart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $countKategori ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Kategori Card -->

                    <!-- Menu Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card menu-card">

                            <div class="card-body">
                                <h5 class="card-title">Menu</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bar-chart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $countMenu ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Menu Card -->

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Penjualan</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $count ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Transaksi</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Rp. <?= number_format($totalTransaksi) ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->
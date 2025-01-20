<?php

include('function/view-query.php');

$user = getUser($_SESSION['hak'], $_SESSION['id_user']);
$countUser = mysqli_num_rows($user);

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


                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->
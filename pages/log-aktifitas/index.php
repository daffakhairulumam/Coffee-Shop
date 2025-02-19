<?php
include('function/view-query.php');

$data = getAktifitas($_SESSION['hak'], $_SESSION['id_user']);

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Log Aktifitas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Log Aktifitas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Log Aktifitas</h5>

                        <!-- Table with stripped rows -->
                        <table id="table-user">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <!-- <th>Id User</th> -->
                                    <th>Username</th>
                                    <th>Login</th>
                                    <th>Logout</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <!-- <td><?= $value['id_user'] ?></td> -->
                                        <td><?= $value['username'] ?></td>
                                        <td><?= $value['login'] ?></td>
                                        <td><?= $value['logout'] ?></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<script>
    $(document).ready(function() {
        $('#table-user').DataTable();
    })
</script>
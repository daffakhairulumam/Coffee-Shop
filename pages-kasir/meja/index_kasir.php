<?php

include('function/view-query.php');

$Daffa_data = getMeja();

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Meja</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index_manajer.php">Home</a></li>
                <li class="breadcrumb-item active">Meja</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($_GET['alert']) && $_GET['alert'] == 'berhasil') { ?>
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Berhasil!</h4>
                                <p>Data berhasil ditambahkan.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }

                        if (isset($_GET['alert']) && $_GET['alert'] == 'berhasil update') { ?>
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Berhasil!</h4>
                                <p>Data berhasil diupdate.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }

                        if (isset($_GET['alert']) && $_GET['alert'] == 'gagal hapus') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Gagal!</h4>
                                <p>Data gagal dihapus.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }

                        if (isset($_GET['alert']) && $_GET['alert'] == 'berhasil hapus') { ?>
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Berhasil!</h4>
                                <p>Data berhasil dihapus.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }
                        ?>
                        <h5 class="card-title">Meja</h5>

                        <!-- Table with stripped rows -->
                        <table id="table-meja">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Meja</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($Daffa_data as $Daffa_key => $Daffa_value) {
                                    // Skip rows with keterangan "Take Away"
                                    if ($Daffa_value['keterangan'] == 'Take Away') {
                                        continue;
                                    }
                                ?>
                                    <tr>
                                        <td><?= $Daffa_key + 1 ?></td>
                                        <td><?= $Daffa_value['nomor_meja'] ?></td>
                                        <td><?= $Daffa_value['keterangan'] ?></td>
                                        <td>
                                            <?php
                                            if ($Daffa_value['status'] == 'Tersedia') { ?>
                                                <span class="badge bg-success"><?= $Daffa_value['status'] ?></span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger"><?= $Daffa_value['status'] ?></span>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <a href="index_kasir.php?page=meja/edit&id=<?= $Daffa_value['id_meja'] ?>">
                                                <button type="button" class="btn btn-success">
                                                    Edit
                                                </button>
                                            </a>
                                        </td>
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
        $('#table-meja').DataTable();
    })
</script>
<?php

include_once('config/database.php');

$conn = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM t_meja WHERE id_meja = $id";

$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_array($result);
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Meja</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index_manajer.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index_manajer.php?page=meja">Meja</a></li>
                <li class="breadcrumb-item active">Edit Meja</li>
            </ol>
        </nav>
    </div><!--end page title-->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($_GET['alert']) && $_GET['alert'] == 'nomor meja harus diisi') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Gagal!</h4>
                                <p>Nomor Meja harus diisi.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }

                        if (isset($_GET['alert']) && $_GET['alert'] == 'gagal') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Gagal!</h4>
                                <p>Data gagal ditambahkan.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }
                        ?>
                        <h5 class="card-title">Edit Kategori</h5>

                        <form action="logic/meja/update.php" method="post">

                            <div class="form-group mb-3">
                                <input type="hidden" name="id_meja" value="<?= $id ?>" placeholder="Input ID" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Nomor Meja</label>
                                <input type="text" name="nomor_meja" value="<?= $data['nomor_meja'] ?>" placeholder="Input Keterangan" class="form-control" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" value="<?= $data['keterangan'] ?>" placeholder="Input Keterangan" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="<?= $data['status'] ?>">-- Pilih --</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                            </div>

                            <hr>

                            <div class="text-end">
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button type="submit" name="Submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
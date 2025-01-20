<?php

include_once('./config/database.php');

$conn = connection();

$id = $_GET['id'];
$query = "SELECT * FROM tuser WHERE id_user = '$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?page=user">User</a></li>
                <li class="breadcrumb-item active">Edit User</li>
            </ol>
        </nav>
    </div><!--end page title-->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit User</h5>

                        <form action="logic/user/update.php" method="post">
                            <?php
                            if (isset($_GET['alert']) && $_GET['alert'] == 'gagal') { ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <h4 class="alert-heading">Gagal!</h4>
                                    <p>Data gagal ditambahkan.</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php }

                            if (isset($_GET['alert']) && $_GET['alert'] == 'hak akses harus di isi') { ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <h4 class="alert-heading">Gagal!</h4>
                                    <p>Hak akses harus di isi</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php }
                            ?>
                            <div class="form-group mb-3">
                                <input type="hidden" name="id_user" placeholder="Input ID" class="form-control" value="<?= $data['id_user'] ?>">
                            </div>

                            <div class="form-group mb-3">
                                <label>Username</label>
                                <input type="text" name="username" placeholder="Input Username" class="form-control" value="<?= $data['username'] ?>">
                            </div>

                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Input Password" class="form-control" value="<?= $data['password'] ?>">
                            </div>

                            <div class="form-group mb-3">
                                <label>Nama User</label>
                                <input type="text" name="nama_user" placeholder="Input Nama User" class="form-control" value="<?= $data['nama_user'] ?>">
                            </div>

                            <div class="form-group mb-3">
                                <label>Hak Akses</label>
                                <select class="form-control" name="hak">
                                    <option value="<?= $data['hak'] ?>">--Pilih--</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Manajer">Manajer</option>
                                    <option value="Kasir">Kasir</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Telepon</label>
                                <input type="text" name="telpon" placeholder="Input Telepon" class="form-control" value="<?= $data['telepon'] ?>">
                            </div>

                            <div class="form-group mb-3">
                                <label>Alamat</label>
                                <input type="text" name="alamat" placeholder="Input Alamat" class="form-control" value="<?= $data['alamat'] ?>">
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
<?php
include('function/view-query.php');

$data = getUser($_SESSION['hak'], $_SESSION['id_user']);

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User</h5>

                        <div class="text-end mb-3">
                            <a href="index.php?page=user/create">
                                <button type="button" class="btn btn-primary">
                                    Tambah
                                </button>
                            </a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table id="table-user">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Nama User</th>
                                    <th>Hak</th>
                                    <th>Telpon</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['username'] ?></td>
                                        <td><?= $value['nama_user'] ?></td>
                                        <td><?= $value['hak'] ?></td>
                                        <td><?= $value['telepon'] ?></td>
                                        <td><?= $value['alamat'] ?></td>
                                        <td>
                                            <a href="index.php?page=user/edit&id=<?= $value['id_user'] ?>">
                                                <button type="button" class="btn btn-primary">
                                                    Edit
                                                </button>
                                            </a>
                                            <a href="logic/user/delete.php?id=<?= $value['id_user'] ?>" onclick="javascript:return confirm('Hapus Data User ?');">
                                                <button type="button" class="btn btn-danger">
                                                    Hapus
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
        $('#table-user').DataTable();
    })
</script>
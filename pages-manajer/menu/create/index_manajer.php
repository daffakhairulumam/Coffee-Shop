<?php
include('function/view-query.php');

$codeMenu = genereteCodeMenu();
$categoryOptions = getCategory(null);
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Menu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index_manajer.php?page=menu">Menu</a></li>
                <li class="breadcrumb-item active">Tambah Menu</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($_GET['alert']) && $_GET['alert'] == 'gagal') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Gagal!</h4>
                                <p>Data gagal ditambahkan.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }

                        if (isset($_GET['alert']) && $_GET['alert'] == 'gagal_ekstensi') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Gagal!</h4>
                                <p>Ekstensi gambar harus PNG, JPG, JPEG.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }

                        if (isset($_GET['alert']) && $_GET['alert'] == 'gagal_ukuran') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Gagal!</h4>
                                <p>Ukuran gambar terlalu besar.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }
                        if (isset($_GET['alert']) && $_GET['alert'] == 'negative_value') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Gagal!</h4>
                                <p>Harga dan stok tidak boleh bernilai negatif.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }

                        if (isset($_GET['alert']) && $_GET['alert'] == 'empty_fields') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Gagal!</h4>
                                <p>Semua field harus diisi.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }
                        if (isset($_GET['alert']) && $_GET['alert'] == 'invalid_price') { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <h4 class="alert-heading">Gagal!</h4>
                                <p>Harga harus lebih besar dari 0.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }
                        ?>
                        <h5 class="card-title">Tambah Barang</h5>

                        <form action="logic/menu/save.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label>Kode Menu</label>
                                <input type="text" name="kode_menu" placeholder="Input Kode Menu" class="form-control" value="<?= $codeMenu; ?>" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Nama Menu</label>
                                <input type="text" name="nama_menu" placeholder="Input Nama Menu" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php
                                    foreach ($categoryOptions as $category) { ?>
                                        <option value="<?= $category['id']; ?>"><?= $category['nama_kategori']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Deskripsi</label>
                                <input type="text" name="deskripsi" placeholder="Input Deskripsi" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Stok</label>
                                <input type="number" name="stock" oninput="this.value = this.value < 0 ? 0 : this.value" placeholder="Input Stok" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Harga</label>
                                <input type="number" name="harga" oninput="validatePrice(this)" min="1" placeholder="Input Harga" class="form-control">
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
</main><!-- End #main -->

<script>
    function validatePrice(input) {
        // Hapus angka 0 di depan
        input.value = input.value.replace(/^0+/, '');

        // Jika nilai kurang dari 1, set ke kosong
        if (input.value <= 0) {
            input.value = '';
        }
    }
</script>
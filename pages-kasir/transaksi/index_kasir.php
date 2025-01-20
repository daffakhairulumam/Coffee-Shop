<?php
include('function/view-query.php');

$user = getUser($_SESSION['hak'], $_SESSION['id_user']);
$dataMeja = getMeja();
$dataMenu = getMenu();
$idTransaksi = genereteCodeTransaksi();
$keranjang = getKeranjang($idTransaksi);
$kodeMenu = '';
$total = 0;
$idTransaksiPrevous = '';

if (!empty($_GET['id_transaksi'])) {
    $idTransaksiPrevous = $_GET['id_transaksi'];
    $disabledCetak = '';
} else {
    $disabledCetak = 'disabled';
}

foreach ($keranjang as $key => $value) {
    $total += $value['total'];
}

if ($total < 0 || $total == 0) {
    $disabled = 'disabled';
} else {
    $disabled = '';
}

if (isset($_GET['kode_menu'])) {
    $kodeMenu = $_GET['kode_menu'];
}

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transaksi</h5>

                        <?php if (isset($_GET['alert'])) : ?>
                            <?php if ($_GET['alert'] == 'berhasil_transaksi') : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Berhasil
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php elseif ($_GET['alert'] == 'gagal_transaksi') : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle me-1"></i>
                                    Gagal
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <label class="input-group-text">Kode Menu</label>
                                    <input type="text" class="form-control" value="<?= $kodeMenu ?>" readonly>
                                    <button class="btn btn-outline-primary" type="button" title="Pilih Menu" data-bs-toggle="modal" data-bs-target="#modalMenu">
                                        <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <label class="input-group-text">Id Transaksi</label>
                                    <input type="text" class="form-control" id="id_transaksi" value="<?= $idTransaksi ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table table-bordered" id="table-menu">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Menu</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (empty($keranjang)) { ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data</td>
                                    </tr>
                                    <?php } else {
                                    foreach ($keranjang as $key => $value) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value['kode_menu'] ?></td>
                                            <td><?= $value['nama_menu'] ?></td>
                                            <td>Rp.<?= number_format($value['harga'], 0, ',', '.') ?></td>
                                            <td><?= $value['qty'] ?></td>
                                            <td>Rp.<?= number_format($value['total'], 0, ',', '.') ?></td>
                                            <td>
                                                <img src="public/img/product/<?= $value['gambar'] ?>" width="50px">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" onclick="modalQty(<?= $value['id'] ?>)">
                                                    Tambah Qty
                                                </button>
                                                <a href="logic/keranjang/delete.php?id=<?= $value['id'] ?>" onclick="javascript:return confirm('Hapus Data Keranjang ?');">
                                                    <button type="button" class="btn btn-danger">
                                                        Hapus
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        <hr>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <label class="input-group-text">Total</label>
                                    <input type="text" class="form-control" id="total" value="<?= $total ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <label class="input-group-text">Bayar</label>
                                    <input type="text" class="form-control" id="bayar" onkeyup="kembalian()" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <label class="input-group-text">Kembalian</label>
                                    <input type="text" class="form-control" id="kembalian" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <button class="btn btn-primary" type="button" onclick="bayar()" <?= $disabled ?>>Bayar</button>
                                </div>
                            </div>
                            <!-- <div class="col-lg-2 mt-2">
                                <div class="input-group">
                                    <a href="logic/transaksi/cetak.php?id_transaksi=<?= $idTransaksiPrevous ?>" target="_blank">
                                        <button class="btn btn-primary" type="button" id="cetak-struk" <?= $disabledCetak ?>>Cetak Struk <?= $idTransaksiPrevous ?></button>
                                    </a>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Menu -->
    <div class="modal fade" id="modalMenu" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered responsive" id="table-pilih-menu">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Menu</th>
                                <th>Nama Menu</th>
                                <th>Kategori</th>
                                <th>Stock</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($dataMenu)) { ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data</td>
                                </tr>
                                <?php } else {
                                foreach ($dataMenu as $key => $value) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['kode_menu'] ?></td>
                                        <td><?= $value['nama_menu'] ?></td>
                                        <td><?= $value['nama_kategori'] ?></td>
                                        <td><?= $value['stock'] ?></td>
                                        <td><?= $value['harga'] ?></td>
                                        <td>
                                            <img src="public/img/product/<?= $value['gambar'] ?>" width="50px">
                                        </td>
                                        <td>
                                            <a href="logic/keranjang/save.php?id_transaksi=<?= $idTransaksi ?>&kode_menu=<?= $value['kode_menu'] ?>">
                                                <button type="button" class="btn btn-primary">
                                                    Pilih
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                            <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Menu -->

    <!-- Modal Qty -->
    <div class="modal fade" id="modalQty" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Qty</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="logic/keranjang/update.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Qty</label>
                            <input type="hidden" name="id" id="id">
                            <input type="number" name="qty" id="qty" placeholder="Input Qty" class="form-control">
                        </div>

                        <div class="text-end">
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="submit" name="Submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Menu -->

    <!-- Modal Bayar -->
    <div class="modal fade" id="modalBayar" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bayar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="logic/transaksi/save.php" method="POST" id="payment-form">
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <label class="input-group-text">Nomor Meja</label>
                                <select class="form-select" id="nomor_meja" name="id_meja" required>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($dataMeja as $value) : ?>
                                        <option value="<?= $value['id_meja'] ?>"
                                            <?= $value['status'] === 'Tidak Tersedia' ? 'disabled' : '' ?>>
                                            <?= $value['nomor_meja'] ?> - <?= $value['keterangan'] ?>
                                            (<?= $value['status'] ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Total</label>
                            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>" id="">
                            <input type="hidden" name="id_transaksi" id="id_transaksi2">
                            <input type="hidden" name="total" id="total2">
                            <input type="number" name="bayar" id="bayar2" class="form-control" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label>Kembalian</label>
                            <input type="number" name="kembalian" id="kembalian2" class="form-control" readonly>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="Submit" class="btn btn-success">Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Bayar -->

    <!-- Modal Cetak Struk -->
    <div class="modal fade" id="cetakStrukModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cetak Struk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Transaksi berhasil! Ingin mencetak struk?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="#" id="cetakStrukLink" target="_blank" class="btn btn-primary">Cetak Struck <br><?= $idTransaksiPrevous ?></a>
                </div>
            </div>
        </div>
    </div>

</main><!-- End #main -->

<script>
    function removeUrlParameter(param) {
        const url = new URL(window.location.href);
        url.searchParams.delete(param);
        window.history.replaceState({}, document.title, url.toString());
    }

    $(document).ready(function() {
        $('#table-menu').DataTable();
        $('#table-pilih-menu').DataTable();

        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('alert') === 'berhasil_transaksi') {
            const idTransaksi = urlParams.get('id_transaksi');
            showCetakStrukModal(idTransaksi);
        }

        // Hapus parameter alert ketika modal ditutup
        $('#cetakStrukModal').on('hidden.bs.modal', function() {
            removeUrlParameter('alert');
            removeUrlParameter('id_transaksi');
        });

        $('#nomor_meja').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            if (selectedOption.is(':disabled')) {
                alert('Meja ini tidak tersedia. Silakan pilih meja lain.');
                $(this).val(''); // Reset selection
                return false;
            }
            validatePaymentForm();
        });
    });

    function showCetakStrukModal(idTransaksi) {
        $('#cetakStrukLink').attr('href', 'logic/transaksi/cetak.php?id_transaksi=' + idTransaksi);
        $('#cetakStrukModal').modal('show');
    }

    function validatePaymentForm() {
        var nomor_meja = $('#nomor_meja').val();
        var errorMessages = [];

        $('.payment-alert').remove();

        if (!nomor_meja) {
            errorMessages.push("Silakan pilih nomor meja yang tersedia terlebih dahulu!");
        }

        var selectedOption = $('#nomor_meja option:selected');
        if (selectedOption.is(':disabled')) {
            errorMessages.push("Meja yang dipilih tidak tersedia!");
        }

        if (errorMessages.length > 0) {
            var alertHtml = '<div class="alert alert-danger payment-alert" role="alert">';
            errorMessages.forEach(function(msg) {
                alertHtml += '<div><i class="bi bi-exclamation-triangle me-1"></i> ' + msg + '</div>';
            });
            alertHtml += '</div>';

            $('.modal-body').prepend(alertHtml);
            return false;
        }

        return true;
    }

    function modalQty(id) {
        $('#modalQty').modal('show');
        $('#id').val(id);
    }

    // function kembalian() {
    //     var bayar = parseFloat($('#bayar').val()) || 0;
    //     var total = parseFloat($('#total').val());

    //     // Validasi pembayaran harus lebih besar atau sama dengan total
    //     if (bayar < total) {
    //         $('#kembalian').val('');
    //         // alert('Pembayaran harus lebih besar atau sama dengan total belanja!');
    //         return false;
    //     }

    //     var kembalian = bayar - total;
    //     $('#kembalian').val(kembalian);
    // }

    // function bayar() {
    //     var bayar = parseFloat($('#bayar').val()) || 0;
    //     var total = parseFloat($('#total').val());
    //     var idTransaksi = $('#id_transaksi').val();
    //     var idUser = $('#id_user').val();
    //     var kembalian = bayar - total;

    //     // Validasi dasar
    //     if (total <= 0) {
    //         alert('Total Belanja Harus Lebih Besar dari 0');
    //         return false;
    //     }

    //     if (bayar <= 0) {
    //         alert('Masukkan jumlah pembayaran');
    //         return false;
    //     }

    //     // Validasi pembayaran harus cukup
    //     if (bayar < total) {
    //         alert('Pembayaran kurang dari total belanja');
    //         return false;
    //     }

    //     // Show modal dan set nilai
    //     $('#modalBayar').modal('show');

    //     // Reset peringatan sebelumnya
    //     $('.payment-alert').remove();

    //     // Set nilai form
    //     $('#id_transaksi2').val(idTransaksi);
    //     $('#id_user').val(idUser);
    //     $('#total2').val(total);
    //     $('#bayar2').val(bayar);
    //     $('#kembalian2').val(kembalian);

    //     // Handler submit form
    //     $('#payment-form').off('submit').on('submit', function(e) {
    //         e.preventDefault();

    //         if (!validatePaymentForm()) {
    //             return false;
    //         }

    //         this.submit();
    //     });
    // }

    function kembalian() {
        var bayar = $('#bayar').val();
        var total = $('#total').val();
        var kembalian = bayar - total;
        $('#kembalian').val(kembalian);
    }

    function bayar() {
        var bayar = $('#bayar').val();
        var total = $('#total').val();
        var idTransaksi = $('#id_transaksi').val();
        var idUser = $('#id_user').val();
        var kembalian = bayar - total;

        // Validate basic requirements before showing modal
        if (total <= 0) {
            alert('Total Belanja Harus Lebih Besar dari 0');
            return false;
        }

        if (kembalian < 0) {
            alert('Uang Anda Kurang');
            return false;
        }

        // Show modal and set values
        $('#modalBayar').modal('show');

        // Setel ulang peringatan sebelumnya saat membuka modal
        $('.payment-alert').remove();

        // Tetapkan nilai formulir
        $('#id_transaksi2').val(idTransaksi);
        $('#id_user').val(idUser);
        $('#total2').val(total);
        $('#bayar2').val(bayar);
        $('#kembalian2').val(kembalian);

        // Tambahkan pengendali pengiriman ke formulir
        $('#payment-form').off('submit').on('submit', function(e) {
            e.preventDefault();

            if (!validatePaymentForm()) {
                return false;
            }

            // Jika validasi lolos, kirimkan formulir
            this.submit();
        });
    }
</script>
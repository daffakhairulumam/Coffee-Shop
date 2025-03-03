<?php
include('function/view-query.php');

$data = getTransaksi();

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Laporan Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Laporan Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Transaksi</h5>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Tanggal Awal</label>
                                <input type="date" id="min" name="min" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Tanggal Akhir</label>
                                <input type="date" id="max" name="max" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">&nbsp;</label>
                                <button id="resetFilter" class="btn btn-secondary form-control">Reset Filter</button>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">&nbsp;</label>
                                <a href="#" id="exportExcel" class="btn btn-success form-control">Cetak Excel</a>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table id="table-transaksi">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama User</th>
                                    <th>Id Transaksi</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['nama_user'] ?></td>
                                        <td><?= $value['id_transaksi'] ?></td>
                                        <td><?= $value['total_bayar'] ?></td>
                                        <td><?= $value['tgl_transaksi'] ?></td>
                                        <td>
                                            <a href="index_manajer.php?page=laporan-transaksi/detail&id_transaksi=<?= $value['id_transaksi'] ?>">
                                                <button type="button" class="btn btn-primary" title="">
                                                    <i class="bi bi-eye"></i>
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
        // Inisialisasi DataTable
        var table = $('#table-transaksi').DataTable({
            // Mengatur format angka/mata uang
            "columnDefs": [{
                "targets": 3,
                "render": function(data, type, row) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(data);
                }
            }]
        });

        // Fungsi untuk memformat tanggal ke YYYY-MM-DD
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

        // Filter rentang tanggal
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min').val();
                var max = $('#max').val();

                // Jika tidak ada filter tanggal yang dipilih
                if (!min && !max) return true;

                // Index 4 karena kolom tanggal ada di posisi ke-5 (index dimulai dari 0)
                var dateStr = data[4];
                var dateData = new Date(dateStr);
                dateData.setHours(0, 0, 0, 0);

                // Filter per hari (jika hanya tanggal awal yang diisi)
                if (min && !max) {
                    var minDate = new Date(min);
                    minDate.setHours(0, 0, 0, 0);
                    return formatDate(dateData) === formatDate(minDate);
                }

                // Filter rentang tanggal (jika kedua tanggal diisi)
                if (min && max) {
                    var minDate = new Date(min);
                    var maxDate = new Date(max);
                    minDate.setHours(0, 0, 0, 0);
                    maxDate.setHours(23, 59, 59, 999);
                    return dateData >= minDate && dateData <= maxDate;
                }

                return true;
            }
        );

        // Event listener untuk perubahan input tanggal
        $('#min, #max').on('change', function() {
            table.draw();
        });

        // Reset filter
        $('#resetFilter').on('click', function() {
            $('#min').val('');
            $('#max').val('');
            table.draw();
        });

        $('#exportExcel').on('click', function(e) {
            e.preventDefault();

            var minDate = $('#min').val();
            var maxDate = $('#max').val();
            var exportUrl = "logic/detail-laporan/xlshtml.php";

            // Add date parameters if they exist
            if (minDate && maxDate) {
                exportUrl += "?start_date=" + minDate + "&end_date=" + maxDate;
            } else if (minDate) {
                // If only start date is provided, use it for both start and end
                exportUrl += "?start_date=" + minDate + "&end_date=" + minDate;
            }

            // Redirect to the export URL
            window.location.href = exportUrl;
        });
    });
    $('#exportExcel').on('click', function(e) {
        e.preventDefault();

        var minDate = $('#min').val();
        var maxDate = $('#max').val();
        var exportUrl = "logic/detail-laporan/xlshtml.php";

        // Add date parameters if they exist
        if (minDate && maxDate) {
            exportUrl += "?start_date=" + minDate + "&end_date=" + maxDate;
        } else if (minDate) {
            // If only start date is provided, use it for both start and end
            exportUrl += "?start_date=" + minDate + "&end_date=" + minDate;
        }

        // Redirect to the export URL
        window.location.href = exportUrl;
    });
</script>
<?php
include_once '../../config/database.php';

// Fungsi untuk mengkonversi nama hari ke Bahasa Indonesia
function hariIndonesia($tanggal)
{
    $hari = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );

    $namaHari = date('l', strtotime($tanggal));
    return $hari[$namaHari];
}

// Fungsi untuk mengkonversi nama bulan ke Bahasa Indonesia
function bulanIndonesia($tanggal)
{
    $bulan = array(
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    );

    $namaBulan = date('F', strtotime($tanggal));
    return $bulan[$namaBulan];
}

// Fungsi untuk format tanggal lengkap Indonesia
function formatTanggalIndonesia($tanggal)
{
    $tanggalHari = date('d', strtotime($tanggal));
    $tahun = date('Y', strtotime($tanggal));
    return $tanggalHari . ' ' . bulanIndonesia($tanggal) . ' ' . $tahun;
}

// Set headers untuk file Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Transaksi_Coffee_Shop.xls");

// Get database connection
$conn = connection();

// Get filter dates from URL parameters
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : null;
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : null;

// Set default dates to show current period if no filter
if (!$startDate && !$endDate) {
    $startDate = date('Y-m-d', strtotime('monday this week'));
    $endDate = date('Y-m-d', strtotime('sunday this week'));
}

// Modify the SQL query to include date filtering using coffee shop database structure
$sql = "SELECT th_transaksi.id_transaksi, th_transaksi.tgl_transaksi, 
        th_transaksi.jenis_pesanan, th_transaksi.total_bayar, th_transaksi.jumlah_bayar,
        tuser.nama_user, t_meja.nomor_meja, t_meja.keterangan,
        GROUP_CONCAT(CONCAT(t_menu.nama_menu, ' (', td_transaksi.jumlah, ')') SEPARATOR ', ') as detail_pesanan
        FROM th_transaksi 
        INNER JOIN td_transaksi ON th_transaksi.id_transaksi = td_transaksi.id_transaksi 
        INNER JOIN t_menu ON td_transaksi.id_menu = t_menu.id_menu 
        INNER JOIN tuser ON th_transaksi.id_user = tuser.id_user
        INNER JOIN t_meja ON th_transaksi.id_meja = t_meja.id_meja";

// Add date filter if provided
if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $sql .= " WHERE th_transaksi.tgl_transaksi BETWEEN '$startDate' AND '$endDate'";
}

$sql .= " GROUP BY th_transaksi.id_transaksi";
$data = mysqli_query($conn, $sql);

// Modify total query to match the date filter and coffee shop database
$total_query = "SELECT SUM(total_bayar) AS total_periode 
                FROM th_transaksi";

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $total_query .= " WHERE tgl_transaksi BETWEEN '$startDate' AND '$endDate'";
}

$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_periode = $total_row['total_periode'];

// Header styling
echo "<div>
        <style>
            table { width: 100%; border-collapse: collapse; }
            th, td { padding: 8px; border: 1px solid black; }
            .text-center { text-align: center; }
            .text-right { text-align: right; }
            .title { text-align: center; font-size: 16pt; font-weight: bold; margin-bottom: 20px; }
            .info { margin-bottom: 15px; }
            .bold { font-weight: bold; }
            .summary { text-align: right; margin-top: 10px; font-size: 12pt; }
        </style>";

// Title and date range
echo "<div class='title'>Laporan Transaksi Coffee Shop</div>";

// Format periode tanggal
if (!isset($_GET['start_date']) && !isset($_GET['end_date'])) {
    // Jika tidak ada filter tanggal, tampilkan periode minggu ini
    echo "<div class='info'><strong>Periode: " . formatTanggalIndonesia($startDate) .
        " - " . formatTanggalIndonesia($endDate) . " (Minggu Ini)</strong></div>";
} else {
    // Jika ada filter tanggal, tampilkan periode
    echo "<div class='info'><strong>Periode: " . formatTanggalIndonesia($startDate) .
        " - " . formatTanggalIndonesia($endDate) . "</strong></div>";
}

// Table header
echo "<table width='100%' border='1'>
        <thead>
            <tr>
                <th class='text-center'>No.</th>
                <th class='text-center'>ID Transaksi</th>
                <th class='text-center'>Tanggal</th>
                <th class='text-center'>Kasir</th>
                <th class='text-center'>No. Meja</th>
                <th class='text-center'>Jenis Pesanan</th>
                <th class='text-center'>Detail Pesanan</th>
                <th class='text-center'>Total</th>
                <th class='text-center'>Dibayar</th>
                <th class='text-center'>Kembalian</th>
            </tr>
        </thead>
        <tbody>";

// Table content
$no = 1;
while ($row = mysqli_fetch_assoc($data)) {
    $kembalian = $row['jumlah_bayar'] - $row['total_bayar'];
    echo "<tr>
            <td class='text-center'>" . $no++ . "</td>
            <td class='text-center'>" . $row['id_transaksi'] . "</td>
            <td class='text-center'>" . formatTanggalIndonesia($row['tgl_transaksi']) . "</td>
            <td class='text-center'>" . $row['nama_user'] . "</td>
            <td class='text-center'>" . $row['nomor_meja'] . " (" . $row['keterangan'] . ")</td>
            <td class='text-center'>" . $row['jenis_pesanan'] . "</td>
            <td class='text-center'>" . $row['detail_pesanan'] . "</td>
            <td class='text-center'>Rp. " . number_format($row['total_bayar'], 0, ',', '.') . "</td>
            <td class='text-center'>Rp. " . number_format($row['jumlah_bayar'], 0, ',', '.') . "</td>
            <td class='text-center'>Rp. " . number_format($kembalian, 0, ',', '.') . "</td>
        </tr>";
}

// Total row
echo "<tr>
        <td colspan='7' class='text-right'><strong>Total " .
    (isset($_GET['start_date']) && isset($_GET['end_date']) ? "Periode" : "Minggu Ini") .
    "</strong></td>
        <td class='text-center' colspan='3'><strong>Rp. " . number_format($total_periode, 0, ',', '.') . "</strong></td>
      </tr>";

echo "</tbody></table></div>";

<?php

require_once('../../library/fpdf.php');
require_once('../../config/database.php');

// Mulai session untuk mengakses $_SESSION
session_start();

$conn = connection();

// Mendapatkan id_user dari session (kasir yang login)
$id_user = $_SESSION['id_user'];

$id_transaksi = $_GET['id_transaksi']; // Mendapatkan id_transaksi dari URL

// Query untuk mengambil detail transaksi sesuai dengan id_transaksi dan id_user yang login
$query = "SELECT td_transaksi.*, tuser.nama_user, t_menu.kode_menu, t_menu.nama_menu, t_menu.harga, tkategori.nama_kategori, th_transaksi.total_bayar AS total_transaksi, th_transaksi.jumlah_bayar FROM td_transaksi 
JOIN th_transaksi ON td_transaksi.id_transaksi = th_transaksi.id_transaksi JOIN t_menu ON td_transaksi.id_menu = t_menu.id_menu JOIN tkategori ON t_menu.id_kategori = tkategori.id JOIN tuser ON th_transaksi.id_user = tuser.id_user WHERE td_transaksi.id_transaksi = '$id_transaksi' ORDER BY td_transaksi.id_menu ASC";

$data = mysqli_query($conn, $query);

// Query untuk mengambil informasi transaksi utama berdasarkan id_user dan id_transaksi
$queryTransaksi = "SELECT th_transaksi.*, t_meja.nomor_meja, tuser.nama_user, th_transaksi.jenis_pesanan FROM th_transaksi INNER JOIN t_meja ON th_transaksi.id_meja = t_meja.id_meja INNER JOIN tuser ON th_transaksi.id_user = tuser.id_user WHERE th_transaksi.id_transaksi = '$id_transaksi' AND th_transaksi.id_user = '$id_user'"; // Pastikan id_transaksi yang sesuai

$result = mysqli_query($conn, $queryTransaksi);
$dataTransaksi = mysqli_fetch_array($result);

// Menyimpan data transaksi ke dalam variabel Daffa_
$Daffa_id_transaksi = $dataTransaksi['id_transaksi'];
$Daffa_tgl_transaksi = $dataTransaksi['tgl_transaksi'];
$Daffa_nomor_meja = $dataTransaksi['nomor_meja'];
$Daffa_nama_user = $dataTransaksi['nama_user'];
$Daffa_jenis_pesanan = isset($dataTransaksi['jenis_pesanan']) ? $dataTransaksi['jenis_pesanan'] : ''; // Ambil jenis pesanan

$pdf = new FPDF('P', 'mm', array(80, 150));
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(0, 3, 'Caffe Bisa Ngopi Bisa', 0, 1, 'C');

$pdf->SetFont('Arial', '', 5);
$pdf->Cell(0, 3, 'Jl. Ciseupan, Cibeber, Kec. Cimahi Sel., Kota Cimahi', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(0, 3, 'Id Transaksi : ' . $Daffa_id_transaksi, 0, 1, 'L');
$pdf->Cell(0, 3, 'Tanggal Transaksi : ' . $Daffa_tgl_transaksi, 0, 1, 'L');

// Cek jenis pesanan dan tampilkan informasi yang sesuai
if (strtolower($Daffa_jenis_pesanan) == 'take away' || strtolower($Daffa_jenis_pesanan) == 'takeaway') {
    $pdf->Cell(0, 3, 'Jenis Pesanan : Take Away', 0, 1, 'L');
} else {
    $pdf->Cell(0, 3, 'Jenis Pesanan : Dine In', 0, 1, 'L');
    $pdf->Cell(0, 3, 'Nomor Meja : ' . $Daffa_nomor_meja, 0, 1, 'L');
}

$pdf->Cell(0, 3, 'Nama Kasir: ' . $Daffa_nama_user, 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(10, 3, 'No.', 0, 0, 'C');
$pdf->Cell(13, 3, 'Nama', 0, 0, 'C');
$pdf->Cell(13, 3, 'Harga', 0, 0, 'C');
$pdf->Cell(13, 3, 'Qty', 0, 0, 'C');
$pdf->Cell(13, 3, 'Sub Total', 0, 1, 'C');

$pdf->SetFont('Arial', '', 5);

$no = 1;
$total_transaksi = 0;
$jumlah_bayar = 0;

foreach ($data as $key => $value) { // Menggunakan foreach untuk menampilkan data transaksi
    $pdf->Cell(10, 3, $no, 0, 0, 'C');
    $pdf->Cell(13, 3, $value['nama_menu'], 0, 0, 'C');
    $pdf->Cell(13, 3, $value['harga'], 0, 0, 'C');
    $pdf->Cell(13, 3, $value['jumlah'], 0, 0, 'C');
    $pdf->Cell(13, 3, $value['subtotal'], 0, 1, 'C');
    $no++;

    // Capture the values for the last iteration
    $total_transaksi = $value['total_transaksi'];
    $jumlah_bayar = $value['jumlah_bayar'];
}

$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(0, 3, 'Total: ' . $total_transaksi, 0, 1, 'R');
$pdf->Cell(0, 3, 'Total Bayar: ' . $jumlah_bayar, 0, 1, 'R');
$pdf->Cell(0, 3, 'Kembalian: ' . ($jumlah_bayar - $total_transaksi), 0, 1, 'R');

$pdf->SetFont('Arial', '', 5);
$pdf->Cell(0, 3, 'Dicetak Oleh : ' . 'Daffa Khairul Umam', 0, 1, 'C');
$pdf->Cell(0, 3, 'Telp : ' . '088229374948', 0, 1, 'C');

// Pastikan tidak ada output sebelumnya
ob_end_clean();

$pdf->output();

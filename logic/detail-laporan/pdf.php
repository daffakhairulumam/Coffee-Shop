<?php

require_once('../../library/fpdf.php');
require_once('../../config/database.php');

// Mulai session untuk mengakses $_SESSION
session_start();

$Daffa_conn = connection();

// Mendapatkan id_user dari session (kasir atau manajer yang login)
$Daffa_id_user = $_SESSION['id_user'];

$Daffa_id_transaksi = $_GET['id_transaksi']; // Mendapatkan id_transaksi dari URL

// Query untuk detail transaksi tertentu jika idTransaksi diberikan
$Daffa_query = "SELECT td_transaksi.*, tuser.nama_user, t_menu.kode_menu, t_menu.nama_menu, t_menu.harga, tkategori.nama_kategori, th_transaksi.total_bayar AS total_transaksi, th_transaksi.jumlah_bayar, t_menu.kode_menu FROM td_transaksi JOIN th_transaksi ON td_transaksi.id_transaksi = th_transaksi.id_transaksi JOIN t_menu ON td_transaksi.id_menu = t_menu.id_menu JOIN tkategori ON t_menu.id_kategori = tkategori.id JOIN tuser ON th_transaksi.id_user = tuser.id_user WHERE td_transaksi.id_transaksi = '$Daffa_id_transaksi' ORDER BY td_transaksi.id_menu ASC";

$Daffa_data = mysqli_query($Daffa_conn, $Daffa_query);

// Tambahkan jenis_pesanan pada query untuk mendapatkan informasi tipe pesanan
$Daffa_queryTransaksi = "SELECT th_transaksi.id_transaksi, th_transaksi.total_bayar, th_transaksi.jumlah_bayar, th_transaksi.tgl_transaksi, th_transaksi.jenis_pesanan, t_meja.nomor_meja, tuser.nama_user FROM th_transaksi th_transaksi INNER JOIN t_meja t_meja ON th_transaksi.id_meja = t_meja.id_meja INNER JOIN tuser tuser ON th_transaksi.id_user = tuser.id_user WHERE th_transaksi.id_transaksi = '$Daffa_id_transaksi'";

$Daffa_result = mysqli_query($Daffa_conn, $Daffa_queryTransaksi);
$Daffa_dataTransaksi = mysqli_fetch_array($Daffa_result);

// Ambil nama user (kasir/manajer) yang sedang login
$Daffa_queryUser = "SELECT nama_user FROM tuser WHERE id_user = '$Daffa_id_user'";
$Daffa_resultUser = mysqli_query($Daffa_conn, $Daffa_queryUser);
$Daffa_dataUser = mysqli_fetch_array($Daffa_resultUser);
$Daffa_nama_user = $Daffa_dataUser['nama_user'];

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Detail Laporan Transaksi', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Id Transaksi : ' . $Daffa_dataTransaksi['id_transaksi'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Tanggal Transaksi : ' . $Daffa_dataTransaksi['tgl_transaksi'], 0, 1, 'L');

// Menampilkan jenis pesanan dengan kondisi
if ($Daffa_dataTransaksi['jenis_pesanan'] == 'Take Away') {
    $pdf->Cell(0, 10, 'Jenis Pesanan : Take Away', 0, 1, 'L');
} else {
    $pdf->Cell(0, 10, 'Jenis Pesanan : Dine In', 0, 1, 'L');
    $pdf->Cell(0, 10, 'Nomor Meja : ' . $Daffa_dataTransaksi['nomor_meja'], 0, 1, 'L');
}

$pdf->Cell(0, 10, 'Nama Kasir : ' . $Daffa_nama_user, 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'No.', 1, 0, 'C');
$pdf->Cell(30, 10, 'Kode Menu', 1, 0, 'C');
$pdf->Cell(30, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(30, 10, 'Kategori', 1, 0, 'C');
$pdf->Cell(30, 10, 'Harga', 1, 0, 'C');
$pdf->Cell(30, 10, 'Qty', 1, 0, 'C');
$pdf->Cell(30, 10, 'Sub Total', 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);

$Daffa_no = 1;
foreach ($Daffa_data as $Daffa_key => $Daffa_value) {
    $pdf->Cell(10, 10, $Daffa_no, 1, 0, 'C');
    $pdf->Cell(30, 10, $Daffa_value['kode_menu'], 1, 0, 'C');
    $pdf->Cell(30, 10, $Daffa_value['nama_menu'], 1, 0, 'C');
    $pdf->Cell(30, 10, $Daffa_value['nama_kategori'], 1, 0, 'C');
    $pdf->Cell(30, 10, $Daffa_value['harga'], 1, 0, 'C');
    $pdf->Cell(30, 10, $Daffa_value['jumlah'], 1, 0, 'C');
    $pdf->Cell(30, 10, $Daffa_value['subtotal'], 1, 1, 'C');
    $Daffa_no++;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Total: ' . $Daffa_dataTransaksi['total_bayar'], 0, 1, 'R');
$pdf->Cell(0, 10, 'Total Bayar: ' . $Daffa_dataTransaksi['jumlah_bayar'], 0, 1, 'R');
$pdf->Cell(0, 10, 'Kembalian: ' . ($Daffa_dataTransaksi['jumlah_bayar'] - $Daffa_dataTransaksi['total_bayar']), 0, 1, 'R');

$pdf->Output();

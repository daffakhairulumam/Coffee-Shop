<?php

include('../../function/query.php');

$Daffa_idTransaksi = $_GET['id_transaksi'];
$Daffa_kodeMenu = $_GET['kode_menu'];
$Daffa_nomorMeja = $_GET['nomor_meja']; // Ambil nomor meja

$Daffa_data = [
    'id_transaksi' => $Daffa_idTransaksi,
    'kode_menu' => $Daffa_kodeMenu,
    'nomor_meja' => $Daffa_nomorMeja  // Kirim nomor meja
];

if (saveKeranjang($Daffa_data)) {
    header("Location:../../index_kasir.php?page=transaksi&alert=berhasil&kode_barang=$Daffa_kodeMenu");
} else {
    header("Location:../../index_kasir.php?page=transaksi&alert=gagal");
}

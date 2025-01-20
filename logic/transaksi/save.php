<?php

include('../../function/query.php');

$Daffa_id_meja = $_POST['id_meja'];
$Daffa_id_user = $_POST['id_user'];
$Daffa_idTransaksi = $_POST['id_transaksi'];
$Daffa_total = $_POST['total'];
$Daffa_bayar = $_POST['bayar'];

$Daffa_data = [
    'id_meja' => $Daffa_id_meja,
    'id_user' => $Daffa_id_user,
    'id_transaksi' => $Daffa_idTransaksi,
    'total' => $Daffa_total,
    'bayar' => $Daffa_bayar,
];

if (saveTransaksi($Daffa_data)) {
    header("location: ../../index_kasir.php?page=transaksi&alert=berhasil_transaksi&id_transaksi=$Daffa_idTransaksi");
} else {
    header("location: ../../index_kasir.php?page=transaksi&alert=gagal_transaksi");
}

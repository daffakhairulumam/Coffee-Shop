<?php

include('../../function/query.php');

$Daffa_nomor_meja = $_POST['nomor_meja'];
$Daffa_keterangan = $_POST['keterangan'];
$Daffa_status = $_POST['status'];

if (!$Daffa_nomor_meja) {
    header("location: ../../index.php?page=meja/create&alert=nomor meja harus diisi");

    exit();
}

$Daffa_data = [
    'nomor_meja' => $Daffa_nomor_meja,
    'keterangan' => $Daffa_keterangan,
    'status' => $Daffa_status
];

if (saveMeja($Daffa_data)) {
    header("Location: ../../index_manajer.php?page=meja&alert=berhasil");
} else {
    header("Location: ../../index_manajer.php?page=meja&alert=gagal");
}

<?php

include('../../function/query.php');

$Daffa_id = $_POST['id_meja'];
$Daffa_nomor_meja = $_POST['nomor_meja'];
$Daffa_keterangan = $_POST['keterangan'];
$Daffa_status = $_POST['status'];


if (!$Daffa_nomor_meja) {
    header("location: ../../index_manajer.php?page=meja/edit&id=$id&alert=nomor meja harus diisi");

    exit();
}

$Daffa_data = [
    'id_meja' => $Daffa_id,
    'nomor_meja' => $Daffa_nomor_meja,
    'keterangan' => $Daffa_keterangan,
    'status' => $Daffa_status

];

if (updateMeja($Daffa_data)) {
    header("Location: ../../index_manajer.php?page=meja&alert=berhasil update");
} else {
    header("Location: ../../index_manajer.php?page=meja/edit&id=$Daffa_id&alert=gagal");
}

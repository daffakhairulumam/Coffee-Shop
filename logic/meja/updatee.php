<?php

include('../../function/query.php');

$Daffa_Daffa_id = $_POST['id_meja'];
$Daffa_Daffa_status = $_POST['status'];

$Daffa_data = [
    'id_meja' => $Daffa_id,
    'status' => $Daffa_status
];

if (UpdateMejaa($Daffa_data)) {
    header("Location: ../../index_kasir.php?page=meja&alert=berhasil update");
} else {
    header("Location: ../../index_kasir.php?page=meja/edit&id=$Daffa_id&alert=gagal");
}

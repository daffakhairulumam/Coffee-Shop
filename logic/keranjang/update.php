<?php

include('../../function/query.php');

$Daffa_id = $_POST['id'];
$Daffa_qty = $_POST['qty'];

$Daffa_data = [
    'id' => $Daffa_id,
    'qty' => $Daffa_qty
];

if (updateKeranjang($Daffa_data)) {
    header("location: ../../index_kasir.php?page=transaksi");
} else {
    header("location: ../../index_kasir.php?page=transaksi&alert=gagal");
}

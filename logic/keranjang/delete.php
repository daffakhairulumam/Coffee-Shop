<?php

include('../../function/query.php');

$Daffa_id = $_GET['id'];

if (deleteKeranjang($Daffa_id)) {
    header("location: ../../index_kasir.php?page=transaksi&alert=berhasil_hapus");
} else {
    header("location: ../../index_kasir.php?page=transaksi&alert=gagal_hapus");
}

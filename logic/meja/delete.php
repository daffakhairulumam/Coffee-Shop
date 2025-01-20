<?php

include('../../function/query.php');

$Daffa_id = $_GET['id'];

if (deleteMeja($Daffa_id)) {
    header("Location: ../../index_manajer.php?page=meja&alert=berhasil hapus");
} else {
    header("Location:../../index_manajer.php?page=meja&alert=gagal hapus");
}

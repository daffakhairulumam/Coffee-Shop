<?php

include('../../function/query.php');

$Daffa_id = $_GET['id'];

if (deleteMenu($Daffa_id)) {
    header("Location: ../../index_manajer.php?page=menu&alert=berhasil_hapus");
} else {
    header("location: ../../index_manajer.php?page=menu&alert=gagal_hapus");
}

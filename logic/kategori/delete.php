<?php

include('../../function/query.php');

$Daffa_id = $_GET['id'];

if (deleteCategory($Daffa_id)) {
    header("Location: ../../index_manajer.php?page=kategori&alert=berhasil hapus");
} else {
    header("Location:../../index_manajer.php?page=kategori&alert=gagal hapus");
}

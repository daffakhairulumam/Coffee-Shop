<?php

include('../../function/query.php');

$Daffa_conn = connection();

$Daffa_id = $_GET['id'];

if (deleteUser($Daffa_id)) {
    header("location: ../../index.php?page=user&alert=berhasil_hapus");
} else {
    header("location: ../../index.php?page=user/&alert=gagal_hapus");
}

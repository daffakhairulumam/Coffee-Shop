<?php

include('../../function/query.php');

$Daffa_kode_kategori = $_POST['kode_kategori'];
$Daffa_nama_kategori = $_POST['nama_kategori'];

if (!$Daffa_nama_kategori) {
    header("location: ../../index_manajer.php?page=kategori/create&alert=nama kategori harus diisi");

    exit();
}

$Daffa_data = [
    'kode_kategori' => $Daffa_kode_kategori,
    'nama_kategori' => $Daffa_nama_kategori
];

if (saveCategory($Daffa_data)) {
    header("Location: ../../index_manajer.php?page=kategori&alert=berhasil");
} else {
    header("Location: ../../index_manajer.php?page=kategori&alert=gagal");
}

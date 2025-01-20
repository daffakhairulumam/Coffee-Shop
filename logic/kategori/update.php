<?php

include('../../function/query.php');

$Daffa_id = $_POST['id'];
$Daffa_kodeKategori = $_POST['kode_kategori'];
$Daffa_namaKategori = $_POST['nama_kategori'];

if (!$Daffa_namaKategori) {
    header("location: ../../index.php?page=kategori/edit&id=$Daffa_id&alert=nama kategori harus diisi");

    exit();
}

$Daffa_data = [
    'id' => $Daffa_id,
    'kode_kategori' => $Daffa_kodeKategori,
    'nama_kategori' => $Daffa_namaKategori
];

if (updateCategory($Daffa_data)) {
    header("Location: ../../index_manajer.php?page=kategori&alert=berhasil update");
} else {
    header("Location: ../../index_manajer.php?page=kategori/edit&id=$Daffa_id&alert=gagal");
}

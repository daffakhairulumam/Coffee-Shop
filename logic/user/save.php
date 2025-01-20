<?php

include('../../function/query.php');

$Daffa_conn = connection();

$Daffa_id = $_POST['id_user'];
$Daffa_user = $_POST['username'];
$Daffa_pass = md5($_POST['password']);
$Daffa_nama = $_POST['nama_user'];
$Daffa_hak = $_POST['hak'];
if (!$Daffa_hak) {
    header("location: ../../index.php?page=user/create&alert=hak akses harus diisi terlebih dahulu");
    exit();
}
$Daffa_telp = $_POST['telepon'];
$Daffa_alamat = $_POST['alamat'];

$Daffa_data = [
    'id_user' => $Daffa_id,
    'username' => $Daffa_user,
    'password' => $Daffa_pass,
    'nama_user' => $Daffa_nama,
    'hak' => $Daffa_hak,
    'telepon' => $Daffa_telp,
    'alamat' => $Daffa_alamat
];

if (saveUser($Daffa_data)) {
    header("Location: ../../index.php?page=user&alert=berhasil");
} else {
    header("Location: ../../index.php?page=user/create&alert=gagal");
}

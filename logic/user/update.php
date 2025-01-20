<?php

include('../../function/query.php');

$Daffa_sconn = connection();

$Daffa_id = $_POST['id_user'];
$Daffa_user = $_POST['username'];
$Daffa_pass = md5($_POST['password']);
$Daffa_nama = $_POST['nama_user'];
$Daffa_hak = $_POST['hak'];
$Daffa_telp = $_POST['telpon'];
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

if (updateUser($Daffa_data)) {
    header("location: ../../index.php?page=user&alert=berhasil_update");
} else {
    header("location: ../../index.php?page=user/edit&id=$Daffa_id&alert=gagal");
}

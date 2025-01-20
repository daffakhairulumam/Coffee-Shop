<?php

include('../../function/query.php');

$Daffa_kodeMenu = $_POST['kode_menu'];
$Daffa_namaMenu = $_POST['nama_menu'];
$Daffa_idKategori = $_POST['id_kategori'];
$Daffa_deskripsi = $_POST['deskripsi'];
$Daffa_stock = $_POST['stock'];
$Daffa_harga = $_POST['harga'];
if ($Daffa_harga <= 0) {
    header("location:../../index_manajer.php?page=menu&alert=harga_harus_lebih_dari_0");
}

//upload gambar 

$Daffa_rand = rand();
$Daffa_ekstensi = array('jpg', 'jpeg', 'png');
$Daffa_filename = $_FILES['gambar']['name'];
$Daffa_ukuran = $_FILES['gambar']['size'];
$Daffa_ext = pathinfo($Daffa_filename, PATHINFO_EXTENSION);

if (!in_array($Daffa_ext, $Daffa_ekstensi)) {
    header("location: ../../index_manajer.php?page=menu/create&alert=gagal_ekstensi");
} else {
    if ($Daffa_ukuran < 1044070) {
        $Daffa_xx = $Daffa_rand . '_' . $Daffa_filename;
        $Daffa_data = [
            'kode_menu' => $Daffa_kodeMenu,
            'gambar' => $Daffa_xx,
            'nama_menu' => $Daffa_namaMenu,
            'id_kategori' => $Daffa_idKategori,
            'deskripsi' => $Daffa_deskripsi,
            'harga' => $Daffa_harga,
        ];
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../public/img/product/' . $Daffa_xx);

        if (saveMenu($Daffa_data)) {
            header("location: ../../index_manajer.php?page=menu&alert=berhasil");
        } else {
            header("location: ../../index_manajer.php?page=menu/create&alert=gagal");
        }
    } else {
        header("location: ../../index_manajer.php?page=menu/create&alert=gagal_ukuran");
    }
}

<?php

include('../../function/query.php');

$Daffa_idMenu = $_POST['id_menu'];
$Daffa_kodeMenu = $_POST['kode_menu'];
$Daffa_nama_menu = $_POST['nama_menu'];
$Daffa_idKategori = $_POST['id_kategori'];
$Daffa_deskripsi = $_POST['deskripsi'];
$Daffa_stock = $_POST['stock'];
$Daffa_harga = $_POST['harga'];

//upload gambar 

$Daffa_rand = rand();
$Daffa_ekstensi = array('jpg', 'jpeg', 'png');
$Daffa_filename = $_FILES['gambar']['name'];
$Daffa_ukuran = $_FILES['gambar']['size'];
$Daffa_ext = pathinfo($Daffa_filename, PATHINFO_EXTENSION);

if (!in_array($Daffa_ext, $Daffa_ekstensi)) {
    header("location: ../../index_manajer.php?page=menu/edit&id=$Daffa_idMenu&alert=gagal_ekstensi");
} else {
    if ($Daffa_ukuran < 1044070) {
        $Daffa_xx = $Daffa_rand . '_' . $Daffa_filename;
        $Daffa_data = [
            'kode_menu' => $Daffa_kodeMenu,
            'gambar' => $Daffa_xx,
            'nama_menu' => $Daffa_namaMenu,
            'id_kategori' => $Daffa_idKategori,
            'desripsi' => $Daffa_deskripsi,
            'harga' => $Daffa_harga,
        ];
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../public/img/product/' . $Daffa_xx);

        if (updateMenu($Daffa_data, $Daffa_idMenu)) {
            header("Location: ../../index_manajer.php?page=menu&alert=berhasil_update");
        } else {
            header("location: ../../index_manajer.php?page=menu/edit&id=$Daffa_idMenu&alert=gagal");
        }
    } else {
        header("Location: ../../index_manajer.php?page=menu/edit&id=$Daffa_idMenu&alert=gagal_ukuran");
    }
}

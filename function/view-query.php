<?php

require 'config/database.php';

function getUser($current_user_role, $current_user_id)
{
    $conn = connection();

    if ($current_user_role == 'Super Admin') {
        // Admin can see all users
        $query = "SELECT * FROM tuser";
    } elseif ($current_user_role == 'Manajer') {
        // Manajer can only see Kasir users
        $query = "SELECT * FROM tuser WHERE hak = 'Kasir'";
    } else {
        // For other roles, return an empty result or handle as needed
        return mysqli_query($conn, "SELECT * FROM tuser WHERE 1=0");
    }

    $result = mysqli_query($conn, $query);
    return $result;
}

function getAktifitas($user_role, $user_id = null)
{
    $conn = connection();

    if ($user_role === 'Super Admin') {
        $query = "SELECT log_aktifitas.id_log, log_aktifitas.id_user, log_aktifitas.login, log_aktifitas.logout, tuser.username FROM log_aktifitas INNER JOIN tuser ON log_aktifitas.id_user = tuser.id_user ORDER BY log_aktifitas.login DESC";
    } elseif ($user_role === 'Manajer') {
        $query = "SELECT log_aktifitas.id_log, log_aktifitas.id_user, log_aktifitas.login, log_aktifitas.logout, tuser.username FROM log_aktifitas INNER JOIN tuser ON log_aktifitas.id_user = tuser.id_user WHERE tuser.hak = 'Kasir' ORDER BY log_aktifitas.login DESC";
    } else {
        $query = "SELECT log_aktifitas.id_log, log_aktifitas.id_user, log_aktifitas.login, log_aktifitas.logout, tuser.username FROM log_aktifitas INNER JOIN tuser ON log_aktifitas.id_user = tuser.id_user WHERE log_aktifitas.id_user = '$user_id' ORDER BY log_aktifitas.login DESC";
    }

    $result = mysqli_query($conn, $query);

    // Konversi hasil query ke array asosiatif
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function genereteCodeKategori()
{
    $conn = connection();
    $query = "SELECT max(kode_kategori) as kode FROM tkategori";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
    $codeCategory = $data['kode'];

    $noUrut = (int) substr($codeCategory, 3, 3);
    $noUrut++;

    $char = "KTG";
    $newID = $char . sprintf("%03s", $noUrut);

    return $newID;
}

function getCategory($id = null)
{

    $conn = connection();

    if ($id) {
        $query = "SELECT * FROM tkategori WHERE id = '$id'";
    } else {
        $query = "SELECT * FROM tkategori";
    }

    $result = mysqli_query($conn, $query);

    return $result;
}

function genereteCodeMenu()
{
    $conn = connection();
    $query = "SELECT max(kode_menu) as kode FROM t_menu";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
    $codeCategory = $data['kode'];

    $noUrut = (int) substr($codeCategory, 3, 3);
    $noUrut++;

    $char = "MNU";
    $newID = $char . sprintf("%03s", $noUrut);

    return $newID;
}

function generateCodeMeja()
{
    $conn = connection();
    $query = "SELECT max(nomor_meja) as nomor FROM t_meja";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
    $codeCategory = $data['nomor'];

    $noUrut = (int) substr($codeCategory, 3, 3);
    $noUrut++;

    $char = "MJA";
    $newID = $char . sprintf("%03s", $noUrut);

    return $newID;
}

function getMenu($id = null)
{
    $conn = connection();

    if ($id) {
        $query = "SELECT t_menu.*, tkategori.kode_kategori, tkategori.nama_kategori FROM t_menu JOIN tkategori ON t_menu.id_kategori = tkategori.id WHERE t_menu.id_menu = '$id'";
    } else {
        $query = "SELECT t_menu.*, tkategori.kode_kategori, tkategori.nama_kategori FROM t_menu JOIN tkategori ON t_menu.id_kategori = tkategori.id";
    }

    $result = mysqli_query($conn, $query);

    return $result;
}

function getMeja()
{
    $conn = connection();
    $query = "SELECT * FROM t_meja ORDER BY nomor_meja ASC";
    $result = mysqli_query($conn, $query);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function getMejaa()
{
    $conn = connection();

    $query = "SELECT * FROM t_meja WHERE status = 'Tersedia'";
    $result = mysqli_query($conn, $query);

    return $result;
}


function genereteCodeTransaksi()
{
    $conn = connection();
    $query = "SELECT max(id_transaksi) as kode FROM th_transaksi";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
    $codeTransaksi = $data['kode'];

    $noUrut = (int) substr($codeTransaksi, 3, 3);
    $noUrut++;

    $char = "TRX";
    $newID = $char . sprintf("%03s", $noUrut);

    return $newID;
}

function getKeranjang($idTransaksi, $kodeMenu = null)
{
    $conn = connection();

    if ($kodeMenu) {
        $query = "SELECT * FROM tkeranjang JOIN t_menu ON tkeranjang.kode_menu = t_menu.kode_menu WHERE tkeranjang.kode_menu = '$kodeMenu' AND tkeranjang.id_transaksi = '$idTransaksi'";
    } else {
        $query = "SELECT tkeranjang.*, t_menu.nama_menu, t_menu.harga, t_menu.gambar FROM tkeranjang JOIN t_menu ON tkeranjang.kode_menu = t_menu.kode_menu WHERE tkeranjang.id_transaksi = '$idTransaksi'";
    }

    $result = mysqli_query($conn, $query);

    return $result;
}

function getTransaksi($idTransaksi = null)
{
    // Memastikan koneksi ke database berhasil
    $conn = connection();

    // Memastikan idUser yang login digunakan untuk filter transaksi
    $idUser = $_SESSION['id_user']; // Menyimpan id_user dari session yang login
    $roleUser = $_SESSION['hak']; // Menyimpan role_user dari session

    if ($idTransaksi) {
        // Query untuk detail transaksi tertentu jika idTransaksi diberikan
        $query = "SELECT td_transaksi.*, tuser.nama_user, t_menu.kode_menu, t_menu.nama_menu, t_menu.harga, tkategori.nama_kategori, th_transaksi.total_bayar AS total_transaksi, th_transaksi.jumlah_bayar FROM td_transaksi JOIN th_transaksi ON td_transaksi.id_transaksi = th_transaksi.id_transaksi JOIN t_menu ON td_transaksi.id_menu = t_menu.id_menu JOIN tkategori ON t_menu.id_kategori = tkategori.id JOIN tuser ON th_transaksi.id_user = tuser.id_user WHERE td_transaksi.id_transaksi = '$idTransaksi' ORDER BY td_transaksi.id_menu ASC";
    } else {
        if ($roleUser === 'Manajer') {
            // Manajer bisa melihat transaksi semua kasir tanpa filter id_user
            $query = "SELECT th_transaksi.*, t_meja.nomor_meja, tuser.nama_user FROM th_transaksi INNER JOIN t_meja ON th_transaksi.id_meja = t_meja.id_meja INNER JOIN tuser ON th_transaksi.id_user = tuser.id_user";
        } else {
            // Kasir hanya bisa melihat transaksi mereka sendiri
            $query = "SELECT th_transaksi.*, t_meja.nomor_meja, tuser.nama_user FROM th_transaksi INNER JOIN t_meja ON th_transaksi.id_meja = t_meja.id_meja INNER JOIN tuser ON th_transaksi.id_user = tuser.id_user WHERE th_transaksi.id_user = '$idUser'";  // Filter berdasarkan id_user
        }
    }

    // Menjalankan query
    $result = mysqli_query($conn, $query);

    return $result;
}

function getTrans($idTrans = null)
{
    $conn = connection();

    if ($idTrans) {
        $query = "SELECT td_transaksi.*, t_menu.nama_menu, t_menu.harga, tkategori.nama_kategori, th_transaksi.total_bayar, th_transaksi.jumlah_bayar FROM td_transaksi JOIN th_transaksi ON td_transaksi.id_transaksi = th_transaksi.id_transaksi JOIN t_menu ON td_transaksi.id_menu = t_menu.id_menu JOIN tkategori ON t_menu.id_kategori = tkategori.id WHERE td_transaksi.id_transaksi = '$idTrans' ORDER BY td_transaksi.id_menu ASC";
    } else {
        $query = "SELECT * FROM th_transaksi";
    }

    $result = mysqli_query($conn, $query);

    return $result;
}

<?php

include_once('../../config/database.php');

$Daffa_conn = connection();

$Daffa_user = $_POST['username'];
$Daffa_pass = md5($_POST['password']);
$Daffa_sql = "SELECT * FROM tuser WHERE username = '$Daffa_user' AND password = '$Daffa_pass'";
$Daffa_result = mysqli_query($Daffa_conn, $Daffa_sql);
$Daffa_cek = mysqli_num_rows($Daffa_result);

if ($Daffa_cek == 1) {
    $Daffa_data = mysqli_fetch_array($Daffa_result);
    if ($Daffa_data['hak'] == "Super Admin") {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $Daffa_data['id_user'];
        $_SESSION['username'] = $Daffa_data;
        $_SESSION['nama_user'] = $Daffa_data['nama_user'];
        $_SESSION['hak'] = $Daffa_data['hak'];

        header("Location: ../../index.php");
    } elseif ($Daffa_data['hak'] == "Manajer") {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $Daffa_data['id_user'];
        $_SESSION['username'] = $Daffa_data;
        $_SESSION['nama_user'] = $Daffa_data['nama_user'];
        $_SESSION['hak'] = $Daffa_data['hak'];

        date_default_timezone_set("Asia/Jakarta");
        $Daffa_dateLog = date("Y-m-d H:i:s");
        $Daffa_idUser = $Daffa_data["id_user"];

        $Daffa_sqlLog = "INSERT INTO log_aktifitas (id_user, login) VALUES ('$Daffa_idUser', '$Daffa_dateLog')";

        $Daffa_result = mysqli_query($Daffa_conn, $Daffa_sqlLog);

        if ($Daffa_result) {
            header("Location: ../../index_manajer.php");
        }
    } elseif ($Daffa_data['hak'] == "Kasir") {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $Daffa_data['id_user'];
        $_SESSION['username'] = $Daffa_data;
        $_SESSION['nama_user'] = $Daffa_data['nama_user'];
        $_SESSION['hak'] = $Daffa_data['hak'];

        date_default_timezone_set("Asia/Jakarta");
        $Daffa_dateLog = date("Y-m-d H:i:s");
        $Daffa_idUser = $Daffa_data["id_user"];

        $Daffa_sqlLog = "INSERT INTO log_aktifitas (id_user, login) VALUES ('$Daffa_idUser', '$Daffa_dateLog')";

        $Daffa_result = mysqli_query($Daffa_conn, $Daffa_sqlLog);

        if ($Daffa_result) {
            header("Location: ../../index_kasir.php");
        }
    } else {
        echo "<script>alert('Password tidak sesuai')</script>";
        header("location: ../../pages/auth/login.php?error=Password tidak sesuai");
    }
} else {
    echo "<script>alert('Akun tidak ditemukan')</script>";
    header("location: ../../pages/auth/login.php?error=Akun tidak ditemukan");
}

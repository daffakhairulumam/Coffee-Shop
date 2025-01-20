<?php

function connection()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "daffa_khairul_ukk_kasir";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    return $conn;
}

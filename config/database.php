<?php

function connection()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "coffee_shop";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    return $conn;
}

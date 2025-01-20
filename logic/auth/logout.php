<?php

include_once('../../config/database.php');

$Daffa_conn = connection();

session_start();

if (!isset($_SESSION['login']) || !isset($_SESSION['username']['id_user'])) {
    session_destroy();
    header("location: ../../pages/auth/login.php");
    exit();
}

date_default_timezone_set("Asia/Jakarta");
$Daffa_idUser = $_SESSION['username']['id_user'];
$Daffa_dateLog = date('Y-m-d H:i:s');

// Update the most recent log entry for this user that doesn't have a logout time
$Daffa_query = "UPDATE log_aktifitas SET logout = '$Daffa_dateLog' WHERE id_user = '$Daffa_idUser' AND logout IS NULL ORDER BY login DESC LIMIT 1";

$Daffa_result = mysqli_query($Daffa_conn, $Daffa_query);

if ($Daffa_result) {
    session_destroy();
    header("location: ../../pages/auth/login.php");
} else {
    echo "Error updating logout time: " . mysqli_error($conn);
}

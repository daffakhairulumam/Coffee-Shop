<?php

@ob_start();
session_start();

if (isset($_SESSION['login'])) {
  include 'pages-manajer/layouts/header.php';
  include 'pages-manajer/layouts/navbar.php';
  include 'pages-manajer/layouts/sidebar.php';

  if (!empty($_GET['page'])) {
    include 'pages-manajer' . '/' . $_GET['page'] . '/index_manajer.php';
  } else {
    include 'pages-manajer/dashboard/index_manajer.php';
  }

  include 'pages-manajer/layouts/footer.php';
} else {
  echo '<script>window.location="pages-manajer/auth/login.php";</script>';
  exit;
}

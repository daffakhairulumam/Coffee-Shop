<?php

@ob_start();
session_start();

if (isset($_SESSION['login'])) {
  include 'pages-kasir/layouts/header.php';
  include 'pages-kasir/layouts/navbar.php';
  include 'pages-kasir/layouts/sidebar.php';

  if (!empty($_GET['page'])) {
    include 'pages-kasir' . '/' . $_GET['page'] . '/index_kasir.php';
  } else {
    include 'pages-kasir/dashboard/index_kasir.php';
  }

  include 'pages-kasir/layouts/footer.php';
} else {
  echo '<script>window.location="pages-kasir/auth/login.php";</script>';
  exit;
}

<?php
if ($page == 'dashboard') {
  $classDashboard = 'nav-link active';
} else {
  $classDashboard = 'nav-link collapsed';
}

if ($page == 'user') {
  $classUsers = 'nav-link active';
} else {
  $classUsers = 'nav-link collapsed';
}

if ($page == 'aktifitas') {
  $classAktifitas = 'nav-link active';
} else {
  $classAktifitas = 'nav-link collapsed';
}
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="<?php echo $classDashboard ?>" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="<?php echo $classUsers ?>" href="index.php?page=user">
        <i class="bi bi-person"></i>
        <span>User</span>
      </a>
    </li>
    <!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="<?php echo $classAktifitas ?>" href="index.php?page=log-aktifitas">
        <i class="bi bi-activity"></i>
        <span>Aktifitas User</span>
      </a>
    </li>
    <!-- End Dashboard Nav -->

  </ul>

</aside><!-- End Sidebar-->
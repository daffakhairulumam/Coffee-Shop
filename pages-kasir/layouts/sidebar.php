<?php
if ($page == 'dashboard') {
  $classDashboard = 'nav-link active';
} else {
  $classDashboard = 'nav-link collapsed';
}

if ($page == 'meja') {
  $classMeja = 'nav-link active';
} else {
  $classMeja = 'nav-link collapsed';
}
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="<?php echo $classDashboard ?>" href="index_kasir.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="<?php echo $classMeja ?>" href="index_kasir.php?page=meja">
        <i class="bi bi-table"></i>
        <span>Meja</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-pc-display-horizontal"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="transaksi-nav" class="nav-content collapse <?php if ($page == 'transaksi' || $page == 'laporan-transaksi') echo 'show' ?>" data-bs-parent="#sidebar-nav">
        <li>
          <a href="index_kasir.php?page=transaksi" class="<?php if ($page == 'transaksi') echo 'active' ?>">
            <i class="bi bi-circle"></i><span>Transaksi Menu</span>
          </a>
        </li>
        <li>
          <a href="index_kasir.php?page=laporan-transaksi" class="<?php if ($page == 'laporan-transaksi') echo 'active' ?>">
            <i class="bi bi-circle"></i><span>History Transaksi</span>
          </a>
        </li>
      </ul>
    </li><!-- End Master Nav -->

    <!-- End Dashboard Nav -->

  </ul>

</aside><!-- End Sidebar-->
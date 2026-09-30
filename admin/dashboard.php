<?php
  require_once __DIR__ . '/../koneksi.php';
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
  $IdUser = $_SESSION['IdUser'] ?? '';

  $r_user = mysqli_query($koneksi, "SELECT IdUser FROM tbl_user");
  $total_user = mysqli_num_rows($r_user);

  $r_teknisi = mysqli_query($koneksi, "SELECT IdTeknisi FROM tbl_teknisi");
  $total_teknisi = mysqli_num_rows($r_teknisi);

  $r_tiket = mysqli_query($koneksi, "SELECT KodeTiket FROM tbl_tiket");
  $total_tiket = mysqli_num_rows($r_tiket);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
          <ul class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Dashboard</li>
          </ul>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="x_panel">
        <div class="x_title">
          <h4>Welcome!</h4>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <p><b>Hai, <?php echo $IdUser; ?></b></p>
          <p>Selamat datang di halaman administrator PT. APLIKA MEDIA NUSANTARA. Anda dapat mengelola konten melalui menu yang tersedia</p><br>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="info-box blue-bg">
        <i class="fa fa-user"></i>
        <div class="count"><?php echo $total_user; ?></div>
        <div class="title"><a href="admin.php?id=pekerjalist" style="color: white;">Data Karyawan</a></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="info-box dark-bg">
        <i class="fa fa-users"></i>
        <div class="count"><?php echo $total_teknisi; ?></div>
        <div class="title"><a href="admin.php?id=teknisi_list" style="color: white;">Data Teknisi</a></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="info-box twitter-bg">
        <i class="fa fa-envelope"></i>
        <div class="count"><?php echo $total_tiket; ?></div>
        <div class="title"><a href="admin.php?id=tiket_list" style="color: white;">Data Tiket</a></div>
      </div>
    </div>
  </section> <!-- wrapper -->
</section><!-- main-content -->
<br><br><br>

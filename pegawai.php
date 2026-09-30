<?php
  session_start();
  if   (!isset($_SESSION ['IdUser']))
  	{ header('Location:index.php?id=login'); }
  else
  	{ $IdUser = $_SESSION['IdUser']; }

  include "koneksi.php";
  include "./layout/headermember.php";
  include "./layout/sidebarmember.php";
  include "route.php";
  include "./pegawai/dashboard.php";
  include "./layout/footer.php";
?>
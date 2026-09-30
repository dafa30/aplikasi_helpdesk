<?php
  session_start();
  if   (!isset($_SESSION ['IdUser']))
  	{ header('Location:index.php?id=login'); }
  else
  	{ $IdUser = $_SESSION['IdUser']; }

  include "koneksi.php";
  include "./layout/headerteknisi.php";
  include "./layout/sidebarteknisi.php";
  include "route.php";
  include "./teknisi/dashboard.php";
  include "./layout/footer.php";
?>
<?php
  session_start();
  if   (!isset($_SESSION ['IdUser'])) 
  	{ header('Location:index.php?id=login'); }
  else 
  	{ $IdUser = $_SESSION['IdUser']; }

  include "koneksi.php";
  include "./layout/headeradmin.php";
  include "./layout/sidebaradmin.php";
  include "route.php";
  include "./admin/dashboard.php";
  include "./layout/footer.php";
?>

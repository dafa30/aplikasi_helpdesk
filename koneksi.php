<?php
  $host    = "localhost";
  $user    = "root";
  $pass    = "";
  $db      = "helpdesk";
  
  $koneksi = mysqli_connect($host, $user, $pass, $db);
  
  if (!$koneksi) {
      die("Data tidak terkoneksi: " . mysqli_connect_error());
  }
?>
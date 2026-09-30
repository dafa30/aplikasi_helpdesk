<?php
	require_once __DIR__ . '/../../koneksi.php';
	$userID = $_GET['userID'] ?? '';

  $sql = "DELETE FROM tbl_tiket WHERE KodeTiket = '$userID'";
	$simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
	if($simpan) { ?>
		<script>
			alert("Data Tiket berhasil dihapus !");
			document.location="teknisi.php?id=tiketlist";
		</script> <?php
	}

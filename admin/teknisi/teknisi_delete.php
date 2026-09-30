<?php
	require_once __DIR__ . '/../../koneksi.php';
	$userID = $_GET['userID'] ?? '';

  $sql = "DELETE FROM tbl_teknisi WHERE IdTeknisi = '$userID'";
	$simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
	if($simpan) { ?>
		<script>
			alert("Data Teknisi berhasil dihapus !");
			document.location="admin.php?id=teknisi_list";
		</script> <?php
	}

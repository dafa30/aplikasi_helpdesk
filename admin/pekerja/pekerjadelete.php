<?php
	require_once __DIR__ . '/../../koneksi.php';
	$userID = $_GET['userID'] ?? '';

  $sql = "DELETE FROM tbl_user WHERE IdUser = '$userID'";
	$simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
	if($simpan) { ?>
		<script>
			alert("Data karyawan berhasil dihapus !");
			document.location="admin.php?id=pekerjalist";
		</script> <?php
	}

<?php
	session_start();
	require_once ("koneksi.php");
    
    if(isset($_POST['submit_login'])){
	$IdUser  		= $_POST ['IdUser'];
	$PasswordUser   = md5($_POST ['PasswordUser']);
  	$cek_user 		= mysqli_query ($koneksi, "SELECT * FROM tbl_user WHERE IdUser = '$IdUser' and PasswordUser = '$PasswordUser'");
	$jumlah   = mysqli_num_rows($cek_user);
	$hasil    = mysqli_fetch_array($cek_user);

	if($PasswordUser == $hasil['PasswordUser']) {
		$_SESSION['HakAkses'] = $hasil['HakAkses'];
		$_SESSION['IdUser'] = $hasil['IdUser'];

		if($_SESSION['HakAkses'] == "admin"){ 
		    header("location:admin.php"); 
		} else if($_SESSION['HakAkses'] == "pegawai"){
		    header("location:pegawai.php");  
		} else if($_SESSION['HakAkses'] == "teknisi"){
				header("location:teknisi.php"); 
		} else {
		    header("location:login.php");
		}
	}
	else if (($IdUser <> $hasil['IdUser']) or ($PasswordUser <> $hasil ['PasswordUser'])) { ?>
		<script language="JavaScript">
			alert('Username atau Password Salah!');
			document.location="index.php?id=login";
		</script>
	<?php }
	}
?>

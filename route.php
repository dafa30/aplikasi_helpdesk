<?php
if(isset($_GET['id'])) {
	//ROUTE FOR ALL PRIVILEGES
	if($_GET['id'] == "login")		  { include "login.php";		exit(); }
	if($_GET['id'] == "loginprocess") { include "loginprocess.php"; exit(); }
	if($_GET['id'] == "logout") 	  {	include "logout.php";		exit();	}

	//ROUTE FOR ADMIN
	// pekerja
	if($_GET['id'] == "pekerjalist") 		{ include "./admin/pekerja/pekerjalist.php"; 		exit(); }
	if($_GET['id'] == "pekerjaadd") 		{ include "./admin/pekerja/pekerjaadd.php";		exit(); }
	if($_GET['id'] == "pekerjasearch")  	{ include "./admin/pekerja/pekerjasearch.php";	exit(); }

	if($_GET['id'] == "pekerjaedit") 		{ if(isset($_GET['userID'])) 	{ $userID = $_GET['userID']; }
		include "./admin/pekerja/pekerjaedit.php"; exit(); }

	if($_GET['id'] == "pekerjadelete") 	{ if(isset($_GET['userID'])) 	{ $userID = $_GET['userID']; }
		include "./admin/pekerja/pekerjadelete.php"; exit(); }

	// teknisi
	if($_GET['id'] == "teknisi_list") 		{ include "./admin/teknisi/teknisi_list.php"; 	exit(); }
	if($_GET['id'] == "teknisi_add") 		{ include "./admin/teknisi/teknisi_add.php";		exit(); }
	if($_GET['id'] == "teknisi_search")  	{ include "./admin/teknisi/teknisi_search.php";	exit(); }

	if($_GET['id'] == "teknisi_edit") 		{ if(isset($_GET['userID'])) 	{ $userID = $_GET['userID']; }
		include "./admin/teknisi/teknisi_edit.php"; exit(); }

	if($_GET['id'] == "teknisi_delete") 	{ if(isset($_GET['userID'])) 	{ $userID = $_GET['userID']; }
		include "./admin/teknisi/teknisi_delete.php"; exit(); }

	// tiket
	if($_GET['id'] == "tiket_list") 	{ include "./admin/tiket/tiket_list.php"; 	exit(); }
	if($_GET['id'] == "tiket_add") 		{ include "./admin/tiket/tiket_add.php";	exit(); }
	if($_GET['id'] == "tiket_search")  	{ include "./admin/tiket/tiket_search.php";	exit(); }

	if($_GET['id'] == "tiket_edit") 	{ if(isset($_GET['userID'])) 	{ $userID = $_GET['userID']; }
		include "./admin/tiket/tiket_edit.php"; exit(); }

	if($_GET['id'] == "tiket_delete") 	{ if(isset($_GET['userID'])) 	{ $userID = $_GET['userID']; }
		include "./admin/tiket/tiket_delete.php"; exit(); }


	//ROUTE FOR PEGAWAI
	// teknisi
	if($_GET['id'] == "teknisilist") 		{ include "./pegawai/teknisi/teknisilist.php"; 	exit(); }
	if($_GET['id'] == "teknisisearch")  	{ include "./pegawai/teknisi/teknisisearch.php";	exit(); }

	// tiket
	if($_GET['id'] == "tiketlist") 		{ include "./pegawai/tiket/tiketlist.php"; 	exit(); }
	if($_GET['id'] == "tiketadd") 		{ include "./pegawai/tiket/tiketadd.php";	exit(); }
	if($_GET['id'] == "tiketsearch")  	{ include "./pegawai/tiket/tiketsearch.php";	exit(); }

	if($_GET['id'] == "tiketedit") 	{ if(isset($_GET['userID'])) 	{ $userID = $_GET['userID']; }
		include "./pegawai/tiket/tiketedit.php"; exit(); }

	if($_GET['id'] == "tiketdelete") 	{ if(isset($_GET['userID'])) 	{ $userID = $_GET['userID']; }
		include "./pegawai/tiket/tiketdelete.php"; exit(); }

	//ROUTE FOR TEKNISI
	// tiket
	if($_GET['id'] == "tiket-list") 		{ include "./teknisi/tiket/tiket-list.php"; 	exit(); }
	if($_GET['id'] == "tiket-search")  	{ include "./teknisi/tiket/tiket-search.php";	exit(); }

	if($_GET['id'] == "tiket-edit") 	{ if(isset($_GET['userID'])) 	{ $userID = $_GET['userID']; }
		include "./teknisi/tiket/tiket-edit.php"; exit(); }

	if($_GET['id'] == "tiket-delete") 	{ if(isset($_GET['userID'])) 	{ $userID = $_GET['userID']; }
		include "./teknisi/tiket/tiket-delete.php"; exit(); }
}
?>
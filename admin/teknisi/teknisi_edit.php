<?php
  require_once __DIR__ . '/../../koneksi.php';
  $userID = $_GET['userID'] ?? '';

  $query  = "SELECT * FROM tbl_teknisi WHERE IdTeknisi='$userID'";
  $ambil  = mysqli_query($koneksi, $query);
  $data   = mysqli_fetch_array($ambil);

  if (isset($_POST['edit'])){
    $IdTeknisi      = $_POST['IdTeknisi'];
    $NamaTeknisi    = $_POST['NamaTeknisi'];
    $AlamatTeknisi  = $_POST['AlamatTeknisi'];
    $NoTelepon      = $_POST['NoTelepon'];
    $Email          = $_POST['Email'];

    $sql = "UPDATE tbl_teknisi SET IdTeknisi  = '$IdTeknisi',
                            NamaTeknisi       = '$NamaTeknisi',
                            AlamatTeknisi     = '$AlamatTeknisi',
                            NoTelepon         = '$NoTelepon',
                            Email             = '$Email'
    WHERE IdTeknisi = '$userID'";
    $simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
    if($simpan) { ?>
			<script>
				alert("Data Teknisi berhasil diedit !");
				document.location="admin.php?id=teknisi_list";
			</script> <?php
		}
  }
	else if (isset($_POST['batal'])){ ?>
    <script>
       document.location="admin.php?id=teknisi_list";
    </script> <?php
	}
?>

<script type="text/javascript">
 function validasi_input(form) {
  if(form.IdTeknisi.value=="") {
   alert("Kode Teknisi tidak boleh kosong!");
   form.IdTeknisi.focus();
   return false;
 }
 if(form.NamaTeknisi.value=="") {
   alert("Nama Teknisi tidak boleh kosong!");
   form.NamaTeknisi.focus();
   return false;
 }
 if(form.AlamatTeknisi.value=="") {
   alert("Alamat Teknisi tidak boleh kosong!");
   form.AlamatTeknisi.focus();
   return false;
 }
 if(form.NoTelepon.value=="") {
   alert("HP Teknisi tidak boleh kosong!");
   form.NoTelepon.focus();
   return false;
 }
 if(form.Email.value=="") {
   alert("Email Teknisi tidak boleh kosong!");
   form.Email.focus();
   return false;
 }
 return true;
}
</script>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Teknisi</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=teknisi_list">List Data Teknisi</a></li>
          <li><i class="fa fa-file-text-o"></i>Edit Data Teknisi</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal" method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Teknisi</label>
                <div class="col-sm-9">
                  <input type="text" name="IdTeknisi" value="<?php echo $data[0]; ?>" maxlength="10" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Teknisi</label>
                <div class="col-sm-9">
                  <input type="text" name="NamaTeknisi" value="<?php echo $data[1]; ?>" maxlength="40" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Teknisi</label>
                <div class="col-sm-9">
                  <input type="text" name="AlamatTeknisi" value="<?php echo $data[2]; ?>" maxlength="100" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">HP Teknisi</label>
                <div class="col-sm-9">
                  <input type="number" name="NoTelepon" value="<?php echo $data[3]; ?>" maxlength="15" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Email Teknisi</label>
                <div class="col-sm-9">
                  <input type="email" name="Email" value="<?php echo $data[4]; ?>" maxlength="40" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-10 control-label"></label>
                <input type="submit" name="edit" value="Simpan" class="btn btn-primary form control">
                <input type="button" onclick="document.location='admin.php?id=teknisi_list'" name="batal" value="Batal" class="btn btn-danger form control">
                </label>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- wrapper -->
</section> <!-- main-content -->
<br><br><br><br><br>
<?php include "./layout/footer.php"; ?>

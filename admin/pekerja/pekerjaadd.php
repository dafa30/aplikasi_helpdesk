<?php
  require_once __DIR__ . '/../../koneksi.php';

  if(isset($_POST['tambah'])) {
    $IdUser       = $_POST['IdUser'];
    $PasswordUser = md5($_POST['PasswordUser']);
    $NamaUser     = $_POST['NamaUser'];
    $HakAkses     = $_POST['HakAkses'];

    $query = "INSERT INTO tbl_user VALUES('$IdUser','$PasswordUser','$NamaUser','$HakAkses')";
    $simpan = mysqli_query($koneksi, $query) or die (mysqli_connect_error());
	  if($simpan) { ?>
        <script>
  			   alert("Data Karyawan berhasil ditambahkan !");
           document.location="admin.php?id=pekerjalist";
  		  </script> <?php
    }
  }
  else if(isset($_POST['batal'])) { ?>
    <script>
      document.location="admin.php?id=pekerjalist";
    </script> <?php
  }
?>

<script type="text/javascript">
 function validasi_input(form) {
  if(form.IdUser.value=="") {
   alert("ID Karyawan tidak boleh kosong!");
   form.IdUser.focus();
   return false;
 }
 if(form.PasswordUser.value=="") {
   alert("Password tidak boleh kosong!");
   form.PasswordUser.focus();
   return false;
 }
 return true;
}
</script>


<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Karyawan </h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=pekerjalist">List Data Karyawan</a></li>
          <li><i class="fa fa-file-text-o"></i>Add Data Karyawan</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-9">
                  <input type="text" name="IdUser" maxlength="25" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" name="PasswordUser" maxlength="64" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input type="text" name="NamaUser" maxlength="40" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Hak Akses</label>
                <div class="col-sm-9">
                  <select class="custom-select form-control" name="HakAkses">
                    <option value="">== Pilih Hak Akses ==</option>
                    <option value="admin">Admin</option>
                    <option value="pegawai">Pegawai</option>
                    <option value="teknisi">Teknisi</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-10 control-label"></label>
                <input type="submit" name="tambah" value="Simpan" class="btn btn-primary form control">
                <input type="button" onclick="document.location='admin.php?id=pekerjalist'" name="batal" value="Batal" class="btn btn-danger form control">
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

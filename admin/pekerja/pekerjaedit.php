<?php
  require_once __DIR__ . '/../../koneksi.php';
  $userID = $_GET['userID'] ?? '';

  $query  = "SELECT * FROM tbl_user WHERE IdUser='$userID'";
  $ambil  = mysqli_query($koneksi, $query);
  $data   = mysqli_fetch_array($ambil);

  if (isset($_POST['edit'])){
    $IdUser       = $_POST['IdUser'];
    $PasswordUser = md5($_POST['PasswordUser']);
    $NamaUser     = $_POST['NamaUser'];
    $HakAkses     = $_POST['HakAkses'];

    $sql = "UPDATE tbl_user SET IdUser    = '$IdUser',
                            PasswordUser  = '$PasswordUser',
                            NamaUser      = '$NamaUser',
                            HakAkses      = '$HakAkses'
    WHERE IdUser = '$userID'";
    $simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
    if($simpan) { ?>
<script>
  alert("Data Karyawan berhasil diedit !");
  document.location = "admin.php?id=pekerjalist";
</script> <?php
		}
  }
	else if (isset($_POST['batal'])){ ?>
<script>
  document.location = "admin.php?id=pekerjalist";
</script> <?php
	}
?>

<script type="text/javascript">
  function validasi_input(form) {
    if (form.IdUser.value == "") {
      alert("ID Karyawan tidak boleh kosong!");
      form.IdUser.focus();
      return false;
    }
    if (form.PasswordUser.value == "") {
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
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Karyawan</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=pekerjalist">List Data Karyawan</a></li>
          <li><i class="fa fa-file-text-o"></i>Edit Data Karyawan</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal" method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-9">
                  <input type="text" name="IdUser" value="<?php echo $data[0]; ?>" maxlength="25" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" name="PasswordUser" value="<?php echo $data[1]; ?>" maxlength="64"
                    class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input type="text" name="NamaUser" value="<?php echo $data[2]; ?>" maxlength="40"
                    class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Hak Akses</label>
                <div class="col-sm-9">
                  <select class="custom-select form-control" name="HakAkses">
                    <option value="admin" <?php if($data[3] == "admin") echo "selected"; ?>>Admin</option>
                    <option value="pegawai" <?php if($data[3] == "pegawai") echo "selected"; ?>>Pegawai</option>
                    <option value="teknisi" <?php if($data[3] == "teknisi") echo "selected"; ?>>Teknisi</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-10 control-label"></label>
                <input type="submit" name="edit" value="Simpan" class="btn btn-primary form control">
                <input type="button" onclick="document.location='admin.php?id=pekerjalist'" name="batal" value="Batal"
                  class="btn btn-danger form control">
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
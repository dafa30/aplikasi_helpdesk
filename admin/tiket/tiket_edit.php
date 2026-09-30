<?php
  require_once __DIR__ . '/../../koneksi.php';
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
  $IdUser = $_SESSION['IdUser'] ?? '';
  $userID = $_GET['userID'] ?? '';

  $query  = "SELECT * FROM tbl_tiket WHERE KodeTiket='$userID'";
  $ambil  = mysqli_query($koneksi, $query);
  $data   = mysqli_fetch_array($ambil);

  if (isset($_POST['edit'])){
    $ambil_admin = mysqli_query($koneksi, "SELECT IdUser FROM tbl_user WHERE IdUser='$IdUser'");
    $data_admin = mysqli_fetch_array($ambil_admin);

    $KodeTiket     = $_POST['KodeTiket'];
    $Tanggal    = $_POST['Tanggal'];
    $IdTeknisi  = $_POST['IdTeknisi'];
    $StatusTiket = $_POST['StatusTiket'];
    $Keterangan= $_POST['Keterangan'];

    $sql = "UPDATE tbl_tiket SET KodeTiket  = '$KodeTiket',
                                Tanggal      = '$Tanggal',
                                IdTeknisi   = '$IdTeknisi',
                                StatusTiket = '$StatusTiket',
                                Keterangan = '$Keterangan'
    WHERE KodeTiket = '$userID'";
    $simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
    if($simpan) { ?>
<script>
  alert("Data Tiket berhasil diedit !");
  document.location = "admin.php?id=tiket_list";
</script> <?php
		}
  }
	else if (isset($_POST['batal'])){ ?>
<script>
  document.location = "admin.php?id=tiket_list";
</script> <?php
	}
?>

<script type="text/javascript">
  function validasi_input(form) {
    if (form.KodeTiket.value == "") {
      alert("Kode Tiket tidak boleh kosong!");
      form.KodeTiket.focus();
      return false;
    }
    if (form.Tanggal.value == "") {
      alert("Tanggal tidak boleh kosong!");
      form.Tanggal.focus();
      return false;
    }
    if (form.IdTeknisi.value == "") {
      alert("IdTeknisi tidak boleh kosong!");
      form.IdTeknisi.focus();
      return false;
    }
    if (form.StatusTiket.value == "") {
      alert("Status Tiket tidak boleh kosong!");
      form.StatusTiket.focus();
      return false;
    }
    if (form.Keterangan.value == "") {
      alert("Keterangan Tiket tidak boleh kosong!");
      form.Keterangan.focus();
      return false;
    }
    return true;
  }
</script>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Tiket</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=penjualan_list">List Data Tiket</a></li>
          <li><i class="fa fa-file-text-o"></i>Edit Data Tiket</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal" method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Tiket</label>
                <div class="col-sm-9">
                  <input type="text" name="KodeTiket" value="<?php echo $data[0];?>" maxlength="10"
                    class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-9">
                  <input type="text" name="Tanggal" value="<?php echo $data[1];?>" maxlength="40"
                    class="form-control tanggal">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Teknisi</label>
                <div class="col-sm-9">
                  <select class="custom-select form-control" name="IdTeknisi">
                    <?php
                    $ambil_aut = mysqli_query($koneksi, "SELECT IdTeknisi, NamaTeknisi FROM tbl_teknisi ORDER BY IdTeknisi");
                    while($data_aut = mysqli_fetch_array($ambil_aut)){
                      if($data_aut[0] == $data[2]) { ?>
                    <option value="<?php echo $data_aut[0]; ?>" selected><?php echo strtoupper($data_aut[1]);?></option><?php }
                      else { ?> <option value="<?php echo $data_aut[0]; ?>"><?php echo strtoupper($data_aut[1]);?>
                    </option>
                    <?php } } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Status Tiket</label>
                <div class="col-sm-9">
                  <?php if($data[3]=="Rejected") { ?>
                    <select class="custom-select form-control" name="StatusTiket">
                      <option value="Rejected" selected>Rejected</option>
                      <option value="Progress">Progress</option>
                      <option value="Done">Done</option>
                    </select>
                  <?php } ?>
                  <?php if($data[3]=="Progress") { ?>
                    <select class="custom-select form-control" name="StatusTiket">
                      <option value="Rejected">Rejected</option>
                      <option value="Progress" selected>Progress</option>
                      <option value="Done">Done</option>
                    </select>
                  <?php } ?>
                  <?php if($data[3]=="Done") { ?>
                    <select class="custom-select form-control" name="StatusTiket">
                      <option value="Rejected">Rejected</option>
                      <option value="Progress">Progress</option>
                      <option value="Done" selected>Done</option>
                    </select>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan Tiket</label>
                <div class="col-sm-9">
                  <input type="text" name="Keterangan" value="<?php echo $data[4]; ?>" maxlength="40"
                    class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-10 control-label"></label>
                <input type="submit" name="edit" value="Simpan" class="btn btn-primary form control">
                <input type="button" onclick="document.location='admin.php?id=tiket_list'" name="batal" value="Batal"
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
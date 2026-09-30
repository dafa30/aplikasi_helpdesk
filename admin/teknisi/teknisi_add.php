<?php
  require_once __DIR__ . '/../../koneksi.php';

  if(isset($_POST['tambah'])) {
    $IdTeknisi      = $_POST['IdTeknisi'];
    $NamaTeknisi    = $_POST['NamaTeknisi'];
    $AlamatTeknisi  = $_POST['AlamatTeknisi'];
    $NoTelepon      = $_POST['NoTelepon'];
    $Email          = $_POST['Email'];

    $query = "INSERT INTO tbl_teknisi VALUES('$IdTeknisi',
                                            '$NamaTeknisi',
                                            '$AlamatTeknisi',
                                            '$NoTelepon',
                                            '$Email')";
    $simpan = mysqli_query($koneksi, $query) or die (mysqli_connect_error());
	  if($simpan) { ?>
        <script>
  			   alert("Data Teknisi berhasil ditambahkan !");
           document.location="admin.php?id=teknisi_list";
  		  </script> <?php
    }
  }
  else if(isset($_POST['batal'])) { ?>
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
          <li><i class="fa fa-file-text-o"></i>Add Data Teknisi</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Teknisi</label>
                <div class="col-sm-9">
                  <?php
                  $query_kdauto = "SELECT max(IdTeknisi) as maxKode FROM tbl_teknisi";
                  $hasil_kdauto = mysqli_query($koneksi,$query_kdauto);
                  $data_kdauto = mysqli_fetch_array($hasil_kdauto);
                  $kodeTeknisi = $data_kdauto['maxKode'];
                  $noUrut = (int) substr($kodeTeknisi, 3, 5);
                  $noUrut++;
                  $char = "TNS";
                  $kode = $char . sprintf("%05s", $noUrut); ?>
                  <input type="text" name="IdTeknisi" value="<?php echo $kode;?>" maxlength="10" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Teknisi</label>
                <div class="col-sm-9">
                  <input type="text" name="NamaTeknisi" maxlength="40" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Teknisi</label>
                <div class="col-sm-9">
                  <input type="text" name="AlamatTeknisi" maxlength="100" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">HP Teknisi</label>
                <div class="col-sm-9">
                  <input type="number" name="NoTelepon" maxlength="15" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Email Teknisi</label>
                <div class="col-sm-9">
                  <input type="email" name="Email" maxlength="40" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-10 control-label"></label>
                <input type="submit" name="tambah" value="Simpan" class="btn btn-primary form control">
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

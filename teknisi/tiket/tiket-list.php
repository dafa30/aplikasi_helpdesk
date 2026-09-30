<?php
  require_once __DIR__ . '/../../koneksi.php';

  $halaman  = 10;
  $page     = isset($_GET["halaman"])? (int)$_GET["halaman"] : 1;
  $mulai    = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result   = mysqli_query($koneksi, "SELECT * FROM tbl_tiket ORDER BY KodeTiket DESC");
  $no       = $mulai+1;
  $total    = mysqli_num_rows($result);
  $pages    = ceil($total/$halaman);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data tiket</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="teknisi.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>List Data tiket</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-7">
        <form class="form-inline pull-left" role="form" method="post" action="teknisi.php?id=tiket-search">
          <div class="form-group">
            <input type="text" class="form-control" name="keyword" placeholder="Pencarian Data" style="width: 150%;">
          </div>
          <input type="submit" name="cari" value="Search" class="btn btn-primary form control"
            style="margin-left: 90px;">
        </form>
      </div>
      <div class="col-lg-5">
        <div class="col-lg-10">
          <a class="btn btn-info pull-right" href="teknisi.php?id=tiket-list"><i class="icon_clipboard"></i> List</a>
        </div>
      </div>
    </div>
    <br>

    <?php
      $result = mysqli_query($koneksi, "SELECT * FROM tbl_tiket ORDER BY KodeTiket DESC");
      $total = mysqli_num_rows($result);
      if($total == 0){
        echo "Tidak ada data tiket";
      }

      else { ?>
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-striped table-advance table-hover">
          <tbody class="col-lg-12">
            <tr>
              <th>No</th>
              <th class="col-md-2">Kode Tiket</th>
              <th class="col-md-2">Tanggal</th>
              <th class="col-md-2">Nama Teknisi</th>
              <th class="col-md-2">Status Tiket</th>
              <th class="col-md-2">Keterangan Tiket</th>
              <th class="col-md-2">Action</th>
            </tr> <?php
               $result2 = mysqli_query($koneksi, "SELECT a.KodeTiket, a.Tanggal, a.StatusTiket, a.Keterangan, b.NamaTeknisi FROM tbl_tiket a JOIN tbl_teknisi b ON (a.IdTeknisi=b.IdTeknisi) ORDER BY KodeTiket DESC LIMIT $mulai, $halaman");
               while($data = mysqli_fetch_array($result2)){ ?>
            <tr> <?php
                    echo "<td>$no</td>";
                    $no++;
                      echo strtoupper("<td>$data[0]</td>");
                      echo strtoupper("<td>$data[1]</td>");
                      echo strtoupper("<td>$data[4]</td>");
                      echo '<td><span';
                      if ($data[2] == "Rejected") {
                          echo ' class="btn btn-danger"';
                      } elseif ($data[2] == "Progress") {
                          echo ' class="btn btn-warning"';
                      } elseif ($data[2] == "Done") {
                          echo ' class="btn btn-success"';
                      }
                      echo '>' . strtoupper($data[2]) . '</span></td>';
                      echo strtoupper("<td>$data[3]</td>");
                     ?>
                     <td>
                        <a class="btn btn-success" href="teknisi.php?id=tiket-edit&userID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                        <a class="btn btn-danger" href="teknisi.php?id=tiket-delete&userID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                    </td>
            </tr> <?php
                } ?>
          </tbody>
        </table>
      </div>
    </div> <?php
        } ?>
    <div class="row">
      <div class="col-lg-12">
        <ul class="pagination pagination pull-right">
          <?php 
             if($page>1){
               $link=$page-1; 
               echo" <li><a href='teknisi.php?id=tiket-list&halaman=$link'>«</a></li> "; }
               else { $prev = ""; }
               for ($i=1; $i<=$pages; $i++){ ?>
          <li><a href="teknisi.php?id=tiket-list&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php }
               
              $JmlHalaman = ceil($total/$halaman);
              if ( $page < $JmlHalaman ) {
               $link = $page + 1;
               echo "<li><a href='teknisi.php?id=tiket-list&halaman=$link'>»</a></li>"; }
              else { $next = ""; } ?>
        </ul>
      </div>
    </div>
  </section>
</section>
<?php include "./layout/footer.php"; ?>
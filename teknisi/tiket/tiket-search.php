<?php
  require_once __DIR__ . '/../../koneksi.php';

  $keyword=$_POST['keyword'];
  $pp = "SELECT a.KodeTiket, a.Tanggal, a.StatusTiket, a.Keterangan, b.NamaTeknisi FROM tbl_tiket a JOIN tbl_teknisi b ON (a.IdTeknisi=b.IdTeknisi)  WHERE KodeTiket like '%$keyword%' or Tanggal like '%$keyword%' or NamaTeknisi like '%$keyword%'";
  $car = mysqli_query($koneksi, $pp);
  $total = mysqli_num_rows($car);
  $no=1;
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Tiket</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="teknisi.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="teknisi.php?id=tiketlist">List Data Tiket</a></li>
          <li><i class="fa fa-file-text-o"></i>Search Data Tiket</a></li>
        </ul>
      </div>
    </div>

    <?php
      $result = mysqli_query($koneksi, "SELECT * FROM tbl_tiket");
      $total = mysqli_num_rows($result);
      if($total == 0){
        echo "Tidak ada data Tiket";
      }

      else { ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>No</th>
                  <th class="col-md-2">Kode Tiket</th>
                  <th class="col-md-2">Tanggal</th>
                  <th class="col-md-2">Nama Teknisi</th>
                  <th class="col-md-2">Status Tiket</th>
                  <th class="col-md-2">Keterangan Tiket</th>
                  <th class="col-md-2">Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($car)){ ?>
                  <tr> <?php
                    echo "<td>$no</td>";
                    $no++;
                    echo strtoupper("<td>$data[0]</td>");
                    echo strtoupper("<td>$data[1]</td>");
                    echo strtoupper("<td>$data[4]</td>");
                    echo strtoupper("<td>$data[2]</td>");
                    echo strtoupper("<td>$data[3]</td>");
                    ?>
                    <td width="22%">
                        <a class="btn btn-success" href="teknisi.php?id=tiketedit&userID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                        <a class="btn btn-danger" href="teknisi.php?id=tiketdelete&userID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                    </td>
                  </tr> <?php
                } ?>
                </tbody>
              </table>
            </div>
          </div> <?php
        } ?>
      </section>
    </section>
    <?php include "./layout/footer.php"; ?>

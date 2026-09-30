<?php
  require_once __DIR__ . '/../../koneksi.php';

  $keyword=$_POST['keyword'];
  $pp = "SELECT * FROM tbl_user WHERE IdUser like '%$keyword%' or PasswordUser like '%$keyword%' or HakAkses like '%$keyword%'";
  $car = mysqli_query($koneksi, $pp);
  $total = mysqli_num_rows($car);
  $no=1;
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Karyawan</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=pekerjalist">List Data Karyawan</a></li>
          <li><i class="fa fa-file-text-o"></i>Search Data Karyawan</a></li>
        </ul>
      </div>
    </div>

    <?php
      $result = mysqli_query($koneksi, "SELECT * FROM tbl_user");
      $total = mysqli_num_rows($result);
      if($total == 0){
        echo "Tidak ada data Karyawan";
      }

      else { ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>No</th>
                  <th class="col-md-3">Username</th>
                  <th class="col-md-3">Nama Lengkap</th>
                  <th class="col-md-3">Hak Akses</th>
                  <th class="col-md-3">Action</th>
                </tr> <?php
                while($data = mysqli_fetch_array($car)){ ?>
                  <tr> <?php
                    echo "<td>$no</td>";
                    $no++;
                      echo "<td>$data[0]</td>";
                      echo strtoupper("<td>$data[2]</td>");
                      echo strtoupper("<td>$data[3]</td>");
                    ?>
                    <td width="22%">
                        <a class="btn btn-success" href="admin.php?id=pekerjaedit&userID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                        <a class="btn btn-danger" href="admin.php?id=pekerjadelete&userID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
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

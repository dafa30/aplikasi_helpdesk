<?php
    require_once("koneksi.php");
    include 		"./layout/header.php";
    include 		"route.php";
?>
<script type="text/javascript">
 function validasi_input(form) {
  if(form.IdUser.value=="") {
   alert("Username tidak boleh kosong !");
   form.IdUser.focus();
   return false;
 }
 if(form.PasswordUser.value=="") {
   alert("Password tidak boleh kosong !");
   form.PasswordUser.focus();
   return false;
 }
 return true;
}
</script>
<br><br>
<section id="main-content">
  <section class="wrapper">
    <div class="col-md-9">
      <div class="panel panel-default" style="margin-right: 25%;margin-left: 25%">
        <div class="panel-heading pull-center">Login - Layanan Helpdesk</div>
        <div class="text-center">
          <br>
          <h4><a href="index.php"><strong>PT. APLIKA MEDIA NUSANTARA</strong></a></h4>
          <form method="post" action="index.php?id=loginprocess" onsubmit="return validasi_input(this);"><br>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="input-group col-md-10 pull-center">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control" placeholder="Username" name="IdUser">
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="input-group col-md-10 pull-center">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="PasswordUser">
              </div>
            </div><br>
            <div class="row">
              <input type="submit" class="btn btn-primary" value="Login" name=submit_login>
            </div><br>
          </form>
        </div>
      </div>
    </div>
    </section>
  </section>
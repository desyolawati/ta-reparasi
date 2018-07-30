<?php 
session_start();
if(!isset($_SESSION['admin'])){
    echo"<script language='JavaScript'>document.location='login.php'</script>";
      exit();
}
include("../connect.php");?>



    <div id="wrapper">

 

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Data Tempat Reparasi Elektronik</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

            
                <!-- /.row -->
<div class="col-sm-12">  <!-- menampilkan list mosque-->
    <section class="panel">
                    <div class="panel-body">
                      
                       
                        <div class="box-body">
                          <div class="box-header clearfix">
      <h3 class="box-title">Profil</h3>
    </div>
             
                      <div class="form-group">
       <table class="table">
        <tr><td>Username</td><td><?php echo $_SESSION['username'] ?></td></tr>
        <tr><td>Password</td><td><a href="#" id="ch" onclick="show()">Ganti Password</a></td></tr>
      </table>
      <br>
      <div id="form" class="hidden">
      <h4>Ganti Password</h4>
        <form role="form" action="act/changepass.php" method="post">
        <input type="text" class="form-control hidden" name="user" value="<?php echo $_SESSION['username'] ?>">
        <div class="form-group">
          <label for="passlama"><span style="color:red">*</span> Password Lama</label>
          <input type="password" class="form-control" name="passlama" placeholder="*****" required>
        </div>
        <div class="form-group">
          <label for="passbaru"><span style="color:red">*</span> Password Baru</label>
          <input type="password" class="form-control" name="passbaru" placeholder="*****" required>
        </div>
        <div class="form-group">
          <label for="konfirm"><span style="color:red">*</span> Konfirmasi Password</label>
          <input type="password" class="form-control" name="konfirm" placeholder="*****" required>
        </div>
        <button type="submit" class="btn btn-primary">Ganti</button>
      </form>            
                  </div>
                    <?php /* } */ ?>
                    </div>
                </section>
              </div>

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
      <!-- jQuery -->
<script>
function show() {
  $("#form" ).removeClass("hidden");
}
</script>
<?php 
session_start();
if(!isset($_SESSION['admin'])){
    echo"<script language='JavaScript'>document.location='login.php'</script>";
      exit();
}
include("../connect.php");?>

<!DOCTYPE html>


    <div id="wrapper">

 

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Edit Layanan</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

            
                <!-- /.row -->

           <div class="col-sm-12">  <!-- menampilkan list mosque-->
                      <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose"><?php echo $data['name'] ?> Facility</a>
                        <div class="box-body">
             
                      <div class="form-group">
                        <form role="form" action="act/updatelaykec.php" method="post">
        <input type="text" class="form-control hidden" id="toko_id" name="toko_id" value="<?php echo $toko_id ?>">
        <div class="form-group">
          <?php
              $sql2 = pg_query("SELECT layanan_id, nama_layananan FROM layanan");
              
              while($dt2 = pg_fetch_array($sql2)){
                $layanan_id=$dt2['layanan_id'];
                $sql3 = pg_query ( "SELECT * FROM layanan_toko_reparasi where toko_id='$toko_id' and layanan_id='$layanan_id'");
                $data3 = pg_fetch_array($sql3);
                if($dt2['layanan_id']==$data3['layanan_id']){
                  echo" <table class='table table-hover table-bordered table-striped'>
                        <tbody><tr><td><div class='checkbox'><label><input name='layanan[]' value='$layanan_id'  type='checkbox' checked>$dt2[nama_layananan]</label></div></tr></tbody></table>";
                }else{
                echo "<table class='table table-hover table-bordered table-striped'>
                        <tbody><tr><td><div class='checkbox'><label><input name='layanan[]' value='$layanan_id'  type='checkbox'>$dt2[nama_layananan]</label></div></td></tr></tbody>
                        </table>";
              }
              }
            ?>
        </div>

        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>   
</form> 
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

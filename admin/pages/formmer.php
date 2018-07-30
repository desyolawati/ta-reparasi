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
                            <small>Edit Merek</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

           <div class="col-sm-12">  <!-- menampilkan list tempat reparaso-->
                      <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose"><?php echo $data['name'] ?> Merek </a>
                        <div class="box-body">
             
                      <div class="form-group">
                        <form role="form" action="act/updatemerkec.php" method="post">
        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $id ?>">
        <div class="form-group">
          <?php
              $sql2 = pg_query("SELECT merek_id, nama_merek FROM merek");
              
              while($dt2 = pg_fetch_array($sql2)){
                $merek_id=$dt2['merek_id'];
                $sql3 = pg_query ( "SELECT * FROM det_toko_produk where toko_id=$toko_id and merek_id=$merek_id");
                $data3 = pg_fetch_array($sql3);
                if($dt2['merek_id']==$data3['merek_id']){
                  echo"<table class='table table-hover table-bordered table-striped'>
                        <tbody><tr><td><div class='checkbox'><label><input name='merek[]' value=\"$row[merek_id]\"  type='checkbox' checked>$dt2[nama_merek]</label></div></tr></tbody></table>";
                }else{
                echo "<table class='table table-hover table-bordered table-striped'>
                        <tbody><tr><td><div class='checkbox'><label><input name='Merek[]' value=\"$row[merek_id]\" type='checkbox'>$dt2[nama_merek]</label></div></td></tr></tbody>
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

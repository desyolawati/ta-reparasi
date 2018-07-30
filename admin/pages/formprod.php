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
                            <small>Edit Produk</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

           <div class="col-sm-12">  <!-- menampilkan list tempat reparaso-->
            <section class="panel">
              <div class="panel-body">
                <a class="btn btn-compose"><?php echo $data['name'] ?> Produk</a>
                  <div class="box-body">
                    <div class="form-group">
                      <form role="form" action="act/updateprodkec.php" method="post">
                        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $id ?>">
                        <div class="form-group">
          <?php
              $sql2 = pg_query("SELECT jenis_elektronik_id, nama_elektronik FROM produk");
              while($dt2 = pg_fetch_array($sql2)){
                $jenis_elektronik_id=$dt2['jenis_elektronik_id'];
                $sql3 = pg_query ( "SELECT * FROM det_toko_produk where toko_id=$toko_id and jenis_elektronik_id=$jenis_elektronik_id");
                $data3 = pg_fetch_array($sql3);
                

                // if($dt2['jenis_elektronik_id']==$data3['jenis_elektronik_id']){
                ?>
                <table class='table table-hover table-bordered table-striped'>
                  <tbody>
                    <tr>
                      <td><div class="checkbox">
                        <label><input name="jenis_elektronik_id[]" value="<?php echo $dt2['jenis_elektronik_id'] ?>"  type="checkbox" <?php if($dt2['jenis_elektronik_id']==$data3['jenis_elektronik_id']){ echo "checked"; } ?>><?php echo $dt2["nama_elektronik"]; ?></label></div></td>
                    </tr>
                    <tr>
                      <?php 
                      $selectMerek = pg_query("SELECT * FROM merek");
                      $jumlah = 0;
                      while($mereks = pg_fetch_array($selectMerek)){
                        $jumlah += 1;
                          // $jenis_elektronik_id=$dt2['jenis_elektronik_id'];
                          $mrk = $mereks['merek_id'];
                          $selekMerek = pg_query( "SELECT * FROM det_toko_produk WHERE toko_id=$toko_id and merek_id=$mrk");
                          $merek = pg_fetch_array($selekMerek);
                        ?>
                        <td style="width: 10%;"><div class="checkbox">
                          <label>
                            <input name="merek[]" value="<?php echo $mereks['merek_id'] ?>"  type="checkbox" <?php if($mereks['merek_id']==$merek['merek_id']){ echo "checked"; } ?>><?php echo $mereks["nama_merek"]; ?> 
                          </label></div></td>
                          <?php
                          if ($jumlah == 9) {
                            $jumlah = 0;
                            echo "</tr><tr>";
                          }
                      }
                      ?>
                    </tr>
                  </tbody>
                </table>
                <?php
              }
            ?>
        </div>
        <!-- <form role="form" action="act/updateprodkec.php" method="post"> -->
                    <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
                    <input type="text" class="form-control hidden" name="jenis_elektronik_ids" value="<?php echo $data['jenis_elektronik_id'] ?>">
                    </div>
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

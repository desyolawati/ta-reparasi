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
                            <small>Tambah Layanan</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

            
                <!-- /.row -->

           <div class="col-sm-12">  <!-- menampilkan list mosque-->
    <section class="panel">
                    <div class="panel-body">
                      
                       
                        <div class="box-body">
             
                      <div class="form-group">
                     <?php if (!isset($_GET['layanan_id'])){ ?>
        <form role="form" action="act/insertlay.php" method="post">
          <a class="btn btn-success btn-sm" onclick="add2()"><i class="fa fa-plus"></i></a>
          <a class="btn btn-danger btn-sm" onclick="rem()"><i class="fa fa-times"></i></a>
          <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
          <div class="form-group" style="clear:both" id="l_form">
            <label for="nama_fasilitas">Layanan</label>
            <input type="text" class="form-control" name="layanan[]" value="" style="margin-bottom:3px;" autofocus required>
          </div>
        </form>

        <?php } if (isset($_GET['layanan_id'])){
                    $layanan_id=$_GET['layanan_id'];
                    $sql = pg_query("SELECT layanan_id, nama_layananan FROM layanan where layanan_id=$layanan_id");
                    $data = pg_fetch_array($sql)
                ?> 
        <form role="form" action="act/updatelay.php" method="post">
                    <button type="submit" class="btn btn-primary pull-right">Simpan <i class="fa fa-floppy-o"></i></button>
                    <input type="text" class="form-control hidden" name="layanan_id" value="<?php echo $data['layanan_id'] ?>">
                    <div class="form-group" style="clear:both">
                        <label for="nama">Layanan</label>
                        <input type="text" class="form-control" name="nama_layananan" value="<?php echo $data['nama_layananan'] ?>" required>
                    </div>
                </form>
                <?php } ?>                 
                  </div>
                    </div>
                </section>
                 
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
                            <small>Edit Produk</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

            
                <!-- /.row -->

           <div class="col-sm-12">  <!-- menampilkan list mosque-->
                    <section class="panel">
                    <div class="panel-body">
                        <div class="box-body" >
<?php if (!isset($_GET['jenis_elektronik_id'])){ ?>
        <form role="form" action="act/insertfas.php" method="post">
          <a class="btn btn-success btn-sm" onclick="add()"><i class="fa fa-plus"></i></a>
          <a class="btn btn-danger btn-sm" onclick="rem()"><i class="fa fa-times"></i></a>
          <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
          <div class="form-group" style="clear:both" id="l_form">
            <label for="nama_fasilitas">Produk</label>
            <input type="text" class="form-control" name="nama_elektronik[]" value="" style="margin-bottom:3px;" autofocus required>
          </div>
        </form>

        <?php } if (isset($_GET['jenis_elektronik_id'])){
                    $jenis_elektronik_id=$_GET['jenis_elektronik_id'];
                    $sql = pg_query("SELECT jenis_elektronik_id, nama_elektronik
  FROM produk where jenis_elektronik_id=$jenis_elektronik_id");
                    $data = pg_fetch_array($sql)
                ?> 
        <form role="form" action="act/updateprod.php" method="post">
                    <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
                    <input type="text" class="form-control hidden" name="jenis_elektronik_id" value="<?php echo $data['jenis_elektronik_id'] ?>">
                    <div class="form-group" style="clear:both">
                        <label for="nama">Produk</label>
                        <input type="text" class="form-control" name="nama_elektronik" value="<?php echo $data['nama_elektronik'] ?>" required>
                    </div>
                </form>
                <?php } ?>
                  </div>
                    </div>
                </section>
                 </div>

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

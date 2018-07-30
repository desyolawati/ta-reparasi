<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
if(!isset($_SESSION['admin'])){
    echo"<script language='JavaScript'>document.location='login.php'</script>";
      exit();
}
include("../connect.php");?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reparasi Alat Elektronik</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">
     <link href="../js/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-fileupload/bootstrap-fileupload.css" />
  <script type="text/javascript" src="../js/jquery.js"></script> 
 
    <script type="text/javascript" src="../js/bootstrap-fileupload/bootstrap-fileupload.js"></script>    
     <script src="inc/script.js" type="text/javascript"></script>
     <script src="../js/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
  


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body >

    <div id="wrapper">

 

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
  
          
              
              
    <section>
      
<?php 

              
               
if (isset($_GET['toko_id'])){
  $toko_id=$_GET['toko_id'];
  $sql4 = "SELECT toko_id, nama_toko_repair, geom, alamat, no_telepon, foto, deskripsi, 
       pemilik, id, id_kecamatan FROM toko_reparasi where toko_id=$toko_id";
              $hasil3=pg_query($sql4);
              while($row3 = pg_fetch_array($hasil3)){
                $nama_toko_repair = $row3['nama_toko_repair'];
                //$nama_merek = $row3['nama_merek'];
?>
<form class="" role="form" action="act/uplayproses.php" method="post">
<button type="submit" class="btn btn-primary" style="float:right"><i class="fa fa-floppy-o"></i> Simpan</button>
<div class="row" style="clear:both;">
<div class="col-xs-12">
  <div class="box">
    <div class="box-body">
    <h4 style="text-transform:capitalize;">Edit Produk Elektronik <?php echo $row3['nama_toko_repair'] ?></h4>
      <div id="forml">
        <input type="text" class="form-control hidden" id="toko_id" name="toko_id" value="<?php echo $toko_id ?>">
          <div class="form-group">
            <?php
              $sql2 = pg_query("SELECT jenis_elektronik_id, nama_elektronik FROM produk");
              while($dt = pg_fetch_array($sql2)){
                $sql3 = pg_query("SELECT * FROM det_toko_produk where toko_id=$toko_id and jenis_elektronik_id=$dt[jenis_elektronik_id]");
                $data3 = pg_fetch_array($sql3);
                if ($dt['jenis_elektronik_id']==$data3['jenis_elektronik_id']){
                  echo "<div class='checkbox'><label><input name='elektronik[]' value=\"$dt[jenis_elektronik_id]\" type='checkbox' checked>$dt[nama_elektronik]</label></div>";
                }else{
                  echo "<div class='checkbox'><label><input name='elektronik[]' value=\"$dt[jenis_elektronik_id]\" type='checkbox'>$dt[nama_elektronik]</label></div>";
                }
              }
            ?>
            
          </div>
      </div>
    </div>
  </div><!-- /.box -->
</div><!-- /.col -->
</div>
</form>
<?php }} ?>
         
    </section>
                 </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
      <!-- jQuery -->
  
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
    <script type="text/javascript">
              $(".timepicker").timepicker({
      showInputs: false,
      showMeridian: false,
      defaultTime: 'value'
        });
    
    </script>
</body>
</html>

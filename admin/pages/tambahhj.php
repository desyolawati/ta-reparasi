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


    <title>Reparasi Alat Elektronik</title>


    <!-- Custom CSS -->


    <!-- Morris Charts CSS -->
     <link href="../js/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>

=
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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Tambah Data Tempat Reparasi Elektronik</small>
                        </h1>
                       
                    </div>
                </div>
          
              
              
    <section >
      
<?php if (isset($_GET['id'])){
  $id=$_GET['id'];
  $sql = pg_query("SELECT * FROM toko_reparasi where toko_id=$id");
  $data =  pg_fetch_array($sql);
?>
<form class="" role="form" action="act/inproses.php" method="post">



<div class="row" style="clear:both;">
<div class="col-xs-6">
  <div class="box">
    <div class="box-body">
      <div id="form">
        <h4 style="text-transform:capitalize;">Jadwal Operasional Toko Reparasi <?php echo $data['nama_toko_repair'] ?></h4>
          <input type="text" class="form-control hidden" name="id" value="<?php echo $id ?>">
          <?php 
          $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
          for($i=0;$i<=6;$i++){ ?>
          <div class="form-group form-inline">

            <label style="width:70px"><?php echo $hari[$i] ?> :</label>
            <input type="text" class="form-control hidden" name="hari[]" value="<?php echo $i ?>">
            <span class="bootstrap-timepicker"><input type="text" class="form-control timepicker" name="buka[]" placeholder="Jam Buka"></span> - 
            <span class="bootstrap-timepicker"><input type="text" class="form-control timepicker" name="tutup[]" placeholder="Jam Tutup"></span>
          </div>
          <?php } ?>
      </div>
    </div>
  </div><!-- /.box -->
</div><!-- /.col -->

</div>
<div align="center">
<button type="submit" class="btn btn-primary" align="center">Simpan</button>
</div>
</form>
<?php } ?>
         
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

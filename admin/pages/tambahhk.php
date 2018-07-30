<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
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
                            <small>Tambah Data Tempat Reparasi Elektronik</small>
                        </h1>
                       
                    </div>
                </div>
          
              
              
    <section >
      
<?php if (isset($_GET['toko_id'])){
  $toko_id=$_GET['toko_id'];
  $sql = pg_query("SELECT * FROM jam_kerja join hari on hari.hari_id=jam_kerja.hari_id where gid=$toko_id order by jam_kerja.hari_id");
?>
<form class="" role="form" action="act/upjamprocess.php" method="post">
<div class="row" style="clear:both;">
<div class="col-xs-12">
  <div class="box">
    <div class="box-body">
      <div id="form">
        <h4 style="text-transform:capitalize;">Jadwal Operasional Toko Reparasi <?php 
          $sql2 = pg_query("SELECT * FROM toko_reparasi where toko_id=$toko_id");
          $dt2 = pg_fetch_array($sql2);
          echo $dt2['nama_toko_repair']; ?>
        </h4>
          <input type="text" class="form-control hidden" name="gid" value="<?php echo $toko_id ?>">
          <?php while($data = pg_fetch_array($sql)){ ?>
          <div class="form-group form-inline">
            <label style="width:70px"><?php echo $data['hari'] ?> :</label>
            <input type="text" class="form-control hidden" name="hari[]" value="<?php echo $data['hari_id'] ?>">
            <span class="bootstrap-timepicker"><input type="text" class="form-control timepicker" name="buka[]" value="<?php echo $data['jam_buka'] ?>" placeholder="Jam Buka"></span> - 
            <span class="bootstrap-timepicker"><input type="text" class="form-control timepicker" name="tutup[]" value="<?php echo $data['jam_tutup'] ?>" placeholder="Jam Tutup"></span>
          </div>
          <?php } ?>
      </div>
    </div>
  </div><!-- /.box -->
</div><!-- /.col -->
<div align="center">
<button type="submit" class="btn btn-primary" align="center">Simpan</button>
</div>
</form>
<?php } ?>
    </section>


<?php 
session_start();
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


    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-fileupload/bootstrap-fileupload.css" />
  <script type="text/javascript" src="../js/jquery.js"></script> 
  
    <script type="text/javascript" src="../js/bootstrap-fileupload/bootstrap-fileupload.js"></script>    
     <script src="inc/script.js" type="text/javascript"></script>

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
                         &nbsp&nbsp<small>Tambah Data Tempat Reparasi Elektronik</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

            
                <!-- /.row -->

                <div class="col-sm-6" id="hide2"> <!-- menampilkan peta-->
                  <section class="panel">
                      <header class="panel-heading">
                          <h3>                    
          <input id="latlng" type="text" class="form-control" style="width:200px" value="" placeholder="Latitude, Longitude">
          <button class="btn btn-default my-btn" id="btnlatlng" type="button" title="Geocode"><i class="fa fa-search"></i></button>
          <button class="btn btn-default my-btn" id="delete-button" type="button" title="Remove shape"><i class="fa fa-trash"></i></button> </h3>
              
                      </header>
                      <div class="panel-body">
                          <div id="map" style="width:100%;height:420px; z-index:50"></div>
                      </div>
                  </section>
              </div>
              
              <div class="col-sm-6" id="hide3"> <!-- menampilkan form add mosque-->
    <section class="panel">
                    <div class="panel-body">
                        <div class="box-body">
                              <div class="form-group input-group">
                                <span class="input-group-addon">Tambah Tempat Reparasi</span>
                               </div>
             
                      <div class="form-group" id="hasilcari1">
                        <form role="form" action="act/insert_reparasi.php" enctype="multipart/form-data" method="post">
                 <?php
          $query = pg_query("SELECT MAX(toko_id) AS toko_id FROM toko_reparasi");
          $result = pg_fetch_array($query);
          $idmax = $result['toko_id'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;}

        ?>
        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $idmax;?>">
        <input type="text" class="form-control hidden" id="id_toko_produk" name="id_toko_produk" value="<?php echo $idmax2;?>">
        <div class="form-group">
          <label for="geom"><span style="color:red">*</span> Koordinat</label>
          <textarea class="form-control" id="geom" name="geom" readonly required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
        </div>
        <div class="form-group">
          <label for="nama"><span style="color:red">*</span>Nama Toko</label>
          <input type="text" class="form-control" name="nama" value="" required  oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
          <label for="nama"><span style="color:red">*</span>Pemilik</label>
          <input type="text" class="form-control" name="pemilik" value="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
          <label for="alamat"><span style="color:red">*</span>Alamat</label>
          <input type="text" class="form-control" name="alamat" value="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
         <div class="form-group"> <!--ini ubah--> 
          <label for="no_hp">No HP</label>
          <input type="text" maxlength="12" class="form-control" name="no_hp" value="">
        </div>

           <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <input type="text" class="form-control" name="deskripsi" value="" >
        </div>
          <div class="form-group">
              <strong> Layanan </strong> <br>
        <?php
          include("../connect.php"); 
          $dataarray=array();
          $sql=pg_query("SELECT layanan_id, nama_layananan FROM layanan");     
          while($row = pg_fetch_array($sql)){
             echo "<input type='checkbox' class='cb-element' value='$row[layanan_id]' name='layanan_id[]'>$row[nama_layananan] &nbsp; &nbsp; 
        <br>";
      }
            ?>
        </div>
         <div class="form-group">
              <strong> Produk </strong> <br>
        <?php
          include("../connect.php"); 
          $dataarray=array();
          $sql=pg_query("SELECT jenis_elektronik_id, nama_elektronik FROM produk");     
          while($row = pg_fetch_array($sql)){
             echo "<input type='checkbox' class='cb-element' value='$row[jenis_elektronik_id]' name='jenis_elektronik_id[]'>$row[nama_elektronik] &nbsp; &nbsp; 
        <br>";
      }
            ?>

        </div>
         <div class="form-group">
              <strong>Merek</strong> <br>
        <?php
          include("../connect.php"); 
          $dataarray=array();
          $sql=pg_query("SELECT merek_id, nama_merek FROM merek");     
          while($row = pg_fetch_array($sql)){
             echo "<input type='checkbox' class='cb-element' value='$row[merek_id]' name='merek_id[]'>$row[nama_merek] &nbsp; &nbsp; 
        <br>";
      }
            ?>

        </div>
              
      
      
                <div class="form-group">
                    <input id="file-0d" class="file" type="file" name="image">
                 </div>
    
        <button type="submit" class="btn btn-primary pull-right"> Lanjut <i class="fa fa-floppy-o"></i></button>   
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
    <!-- /#wrapper -->
      <!-- jQuery -->
  
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

<script>
function layanan(){
  console.log("hy");
  $('#layananlist .checkbox').remove();
  var v=layananlist.value;
  $.ajax({ url: server+'layanan.php?id='+v, data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      var row = rows[i];
      var layanan_id=row.layanan;
      var nama_layanan=row.nama_layanan;
      $('#fasilitaslist').append('<div class="checkbox" style="color: #f3fff4"><label><input type="checkbox" name="fasilitas" value="'+layanan_id+'">'+nama_layanan+'</label></div>');
    }
  }});
}
    $('#file-fr').fileinput({
        language: 'fr',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
    $('#file-es').fileinput({
        language: 'es',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
    $("#file-0").fileinput({
        'allowedFileExtensions': ['jpg', 'png', 'gif']
    });
    $("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    /*
     $(".file").on('fileselect', function(event, n, l) {
     alert('File Selected. Name: ' + l + ', Num: ' + n);
     });
     */
    $("#file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        initialPreview: [
            "http://lorempixel.com/1920/1080/transport/1",
            "http://lorempixel.com/1920/1080/transport/2",
            "http://lorempixel.com/1920/1080/transport/3"
        ],
        initialPreviewConfig: [
            {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
            {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
            {caption: "transport-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
        ]
    });
    $("#file-4").fileinput({
        uploadExtraData: {kvId: '10'}
    });
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });
    /*
     $('#file-4').on('fileselectnone', function() {
     alert('Huh! You selected no files.');
     });
     $('#file-4').on('filebrowse', function() {
     alert('File browse clicked for #file-4');
     });
     */
    $(document).ready(function () {
        $("#test-upload").fileinput({
            'showPreview': false,
            'allowedFileExtensions': ['jpg', 'png', 'gif'],
            'elErrorContainer': '#errorBlock'
        });
        $("#kv-explorer").fileinput({
            'theme': 'explorer',
            'uploadUrl': '#',
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [
                "http://lorempixel.com/1920/1080/nature/1",
                "http://lorempixel.com/1920/1080/nature/2",
                "http://lorempixel.com/1920/1080/nature/3"
            ],
            initialPreviewConfig: [
                {caption: "nature-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
                {caption: "nature-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
                {caption: "nature-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
            ]
        });
        /*
         $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
         alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
         });
         */
    });
</script>

</html>

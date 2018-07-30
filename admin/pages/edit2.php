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
                            <small>Edit Tempat Reparasi Elektronik</small>
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
                                <span class="input-group-addon">Edit Reparasi</span>
                               </div>
             
                      <div class="form-group" id="hasilcari1">
                        <form role="form" action="act/updaterep.php" enctype="multipart/form-data" method="post">
              <?php 
        if (isset($_GET['toko_id']))
        {
        $toko_id=$_GET['toko_id'];
        $sql = pg_query("SELECT toko_id, nama_toko_repair,  ST_AsText(geom) as geom, alamat, no_telepon, foto, deskripsi
  FROM toko_reparasi where toko_id=$toko_id");
        $data =  pg_fetch_array($sql);
         }
      ?>
    <form role="form" action="" enctype="multipart/form-data" method="post">
                         
        <input type="text" class="form-control hidden" id="toko_id" name="toko_id" value="<?php echo $toko_id ?>">
        <div class="form-group">
          <label for="geom">Koordinat</label>
          <textarea class="form-control" id="geom" name="geom" readonly><?php echo $data['geom'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_toko_repair'] ?>">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>">
        </div>
        <div class="form-group">
          <label for="no_telepon">No Telepon</label>
          <input type="text" class="form-control" name="no_telepon" value="<?php echo $data['no_telepon'] ?>" >
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <input type="text" class="form-control" name="deskripsi" value="<?php echo $data['deskripsi'] ?>" >
        </div>
       <div>
        <strong> Layanan </strong> <br>
        <?php
          include("../connect.php"); 
          $dataarray=array();
          $sql=pg_query("SELECT layanan_id, nama_layananan FROM layanan");     
          while($row = pg_fetch_array($sql)){
              $sql3 = pg_query("SELECT * FROM layanan_toko_reparasi where toko_id=$toko_id and layanan_id=$row[layanan_id]");
              $data3 = pg_fetch_array($sql3);
              if ($row['layanan_id']==$data3['layanan_id']){
                  echo "<div class='checkbox'><label><input name='layanan[]' value=\"$row[layanan_id]\" type='checkbox' checked>$row[nama_layananan]</label></div>";
                }else{
                  echo "<div class='checkbox'><label><input name='layanan[]' value=\"$row[layanan_id]\" type='checkbox'>$row[nama_layananan]</label></div>";
                }
      }
  

              ?>
        </div>

        <div>
        <strong> Merek </strong> <br>
        <?php
          include("../connect.php"); 
          $dataarray=array();
          $sql=pg_query("SELECT merek_id, nama_merek FROM merek");     
          while($row = pg_fetch_array($sql)){
              $sql3 = pg_query("SELECT * FROM det_toko_produk where toko_id=$toko_id and merek_id=$row[merek_id]");
              $data3 = pg_fetch_array($sql3);
              if ($row['merek_id']==$data3['merek_id']){
                  echo "<div class='checkbox'><label><input name='merek[]' value=\"$row[merek_id]\" type='checkbox' checked>$row[nama_merek]</label></div>";
                }else{
                  echo "<div class='checkbox'><label><input name='merek[]' value=\"$row[merek_id]\" type='checkbox'>$row[nama_merek]</label></div>";
                }
      }
  

              ?>
        </div>



        <div>
        <strong> Produk </strong> <br>
        <?php
          include("../connect.php"); 
          $dataarray=array();
          $sql=pg_query("SELECT jenis_elektronik_id, nama_elektronik FROM produk");     
          while($row = pg_fetch_array($sql)){
              $sql3 = pg_query("SELECT * FROM det_toko_produk where toko_id=$toko_id and jenis_elektronik_id=$row[jenis_elektronik_id]");
              $data3 = pg_fetch_array($sql3);
              if ($row['jenis_elektronik_id']==$data3['jenis_elektronik_id']){
                  echo "<div class='checkbox'><label><input name='layanan[]' value=\"$row[jenis_elektronik_id]\" type='checkbox' checked>$row[nama_elektronik]</label></div>";
                }else{
                  echo "<div class='checkbox'><label><input name='layanan[]' value=\"$row[jenis_elektronik_id]\" type='checkbox'>$row[nama_elektronik]</label></div>";
                }
      }  

              ?>
        </div>

   
          <div class="form-group">
                    <input id="file-0d" class="file" type="file" name="image">
                 </div>
        <button type="submit" class="btn btn-primary pull-right">Simpan <i class="fa fa-floppy-o"></i></button>   
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

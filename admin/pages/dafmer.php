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
                            <small>Merek</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

            
                <!-- /.row -->

           <div class="col-sm-12">  <!-- menampilkan list mosque-->
    <section class="panel">
                    <div class="panel-body">
                        <div class="btn-group">
                <a href="?page=tambahdatamer"  class="btn btn-sm btn-default" title='Delete'><i class="fa fa-plus"></i>Tambah Merek</a>               <br> <br>  
                <br>
                </div>
                       
                        <div class="box-body">
             
                      <div class="form-group">
                       <table id="example2" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Merek</th>
                        <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                       

                        $sql = pg_query("SELECT merek_id, nama_merek FROM merek order by merek_id asc");
                        while($data =  pg_fetch_array($sql)){
                        $merek_id = $data['merek_id'];
                        $nama_merek = $data['nama_merek'];
                        ?>
                        <tr>
                        <td><?php echo "$merek_id"; ?></td>
                        <td><?php echo "$nama_merek"; ?></td>
                        <td>
                <div class="btn-group">
                <a href="?page=editmerek&merek_id=<?php echo $merek_id; ?>" class="btn btn-sm btn-default" title='edit'><i class="fa fa-pencil "></i>Edit</a>
                </div>
                <div class="btn-group">
                <a href="?page=delmer&merek_id=<?php echo $merek_id; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash"></i></a>
                </div>
            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
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

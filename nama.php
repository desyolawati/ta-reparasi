<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>Reparasi Alat Elektronik</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- Custom CSS -->

      <link rel="stylesheet" href="js/mystyle.css" type="text/css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>
      <script src="script.js"></script>
      <style type="text/css">
      #legend {
        background:white;
        padding: 10px;
        margin: 5px;
        font-size: 12px;
    font-color: blue;
        font-family: Arial, sans-serif;
    }
    .color {
        border: 1px solid;
        height: 12px;
        width: 12px;
        margin-right: 3px;
        float: left;
    }
    .a {
        background: crimson;
      }
    .b {
        background: purple;
      }
      .c {
        background: green;
      }
    .d {
        background: grey;
      }
    .e {
        background: brown`;
      }
    .f {
        background: magenta;
      }
    .g {
        background: pink;
      }
    .h {
        background: white;
      }
    .i {
        background: maroon;
      }
    .j {
        background: yellow;
      }
    .k {
        background: blue;
      }
    .l {
        background: navy;
      }


   </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onload="init()">

    <div id="wrapper">

        <!-- Navigation -->
         <!-- Navigation -->
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" >REPARASI ALAT ELEKTRONIK</a>
            </div>


            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li >
                    <a href="admin/login.php" class="dropdown-toggle" ><i class="fa fa-user"></i> LOGIN <b class="caret"></b></a>
                   
                </li>
            </ul>
           
                

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-search"></i> Pencarian</a>
                        <ul id="demo" class="collapse">
                         <li>
                                <a href="nama.php">Nama</a>                          
                         </li>
                            <li>
                                <a href="kecamatan2.php">Kecamatan</a>
                            </li>
                            <li>
                                <a href="elektronik.php">Alat Elektronik</a>
                            </li>
                             <li>
                                <a href="rating.php">Rating</a>
                            </li>
                            <li>
                                <a href="jadwal.php">Jadwal Operasional</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="Daftar.php" data-target="#demo"><i class="fa fa-list-ul"></i> Daftar Tempat Reparasi </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<br/><br/>
        <div id="page-wrapper">
            <label> Pencarian Berdasarkan Nama</label>
            <input type="text" class="form-control" id="caritempat" name="caritempat" placeholder="Search..." style="width:37%">
<br>
           <button type="submit" class="btn btn-default" value="caritempat" onclick="carinamatempat()"> <i class="fa fa-search"></i></button>  
             <div class="row">
            <div class="col-lg-8"> 
                  <section class="panel">
                      <header class="panel-heading">
                          Google Map with Location List
                          <a class="btn btn-default" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Posisi Saat ini"   ><i class="fa fa-map-marker" style="color:black;"></i></a>
                          <a class="btn btn-default" role="button" data-toggle="collapse" onclick="manualLocation()" title="Posisi manual"><i class="fa fa-location-arrow" style="color:black;"></i></a>
                    <a class="btn btn-default" role="button" data-toggle="collapse" href="#terdekat" title="Terdekat" aria-controls="terdekat"><i class="fa fa-road" style="color:black;"></i></a>
                    <a class="btn btn-default" role="button" data-toggle="collapse" onclick="tampilsemua();resultt()" title="Semua tempat reparasi" aria-controls="terdekat"><i class="fa fa-cube" style="color:black;"></i></a>
                   <div id="tombol">
                    <a class="btn btn-default" role="button" data-toggle="collapse" id="showlegenda" onclick="legenda()" title="Legenda"><i class="fa fa-eye" style="color:black;">Legenda</i></a>
                    </div>
                                <label></label>         
                    <div class="collapse" id="terdekat">
                    <div class="well">
                    <label style="color:black">Radius (Km)</label><br>
                    <input  type="range" onclick="aktifkanRadius();resultt()" id="inputradius" name="inputradius" data-highlight="true" min="1" max="15" value="1" >
                    </div>
          </div>
                      </header>               
                      <div class="panel-body">
                          <div id="map" style="width:100%;height:500px; z-index:50"></div>          
                      </div>
                  </section>
                    <section class="panel">
                      <div class="panel-body" style="display:none;" id='butrute'>
                        <a class="btn btn-lg btn-primary">-------------------------------------------------Rute-----------------------------------------------</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
             
                      <div class="form-group" id='detailrute'>
                          
                      </div>                  
                  </div>
                    </div>
                </section>
          <!--        <section class="panel">
                      <div class="panel-body" style="display:none;" id='butrating'>
                        <a class="btn btn-lg btn-primary">-----------------------------------------------Rating-----------------------------------------------</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
                        <a class="btn btn-lg btn-danger"
                       <div class="panel-body">
                        <center><h3>Informasi</h3></center>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
             
                      <div class="form-group">
                        <table class="table" id='info'>
                        <tbody  style='vertical-align:top;'>
                        </tbody> 
                        </table> 
            
                      </div> 
  
                  </div>
                    </div>               
                  </div>
                    </div>
                </section> -->
              </div>
                 <div class="col-lg-4"> 
                 <section class="panel">
                    <div class="panel-body" >
                        <a class="btn btn-lg btn-primary">------------------Hasil------------------</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">    
                          <div class="table-responsive" id="hasilcari1" style="display:none;">
                            <table class="table table-hover table-striped" id='hasilcari' >                               
                            </table>
                          </div>              
                        </div>
                    </div>
                </section>
                     </div>
                  <div class="col-sm-8" style="display:none;" id="butrating">
                    <section class="panel">
                    <div class="panel-body" style="display" id='ratings'>
                       <div id='sob'><center><a class="btn btn-lg btn-primary">Rating</a></center></div>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
                          <div id="det-r" style="display:none;">
                            <div id="addreview" style="clear:both;">
                              <input type="text" name="gidr" id="gidr" value="" hidden="">                                       
                              <div id="star-container">Rating : 
                              <i class="fa fa-star star2" id="star2-1"></i>
                              <i class="fa fa-star star2" id="star2-2"></i>
                              <i class="fa fa-star star2" id="star2-3"></i>
                              <i class="fa fa-star star2" id="star2-4"></i>
                              <i class="fa fa-star star2" id="star2-5"></i>
                              </div>
                      <input type="text" name="rateid" id="rateid" value="" hidden="">
                      <div>Nama Pengguna : <input class="form-control" type="text" name="user" id="user" value=""></div>
                      <div>Komentar : <textarea class="form-control" name="komentar" id="komentar"></textarea></div>
                      <button type="submit" id="btnaddreview" class="btn btn-primary" onclick="btnaddreview()">Submit <i class="fa fa-comments-o"></i></button><hr>Review :
                            </div>    
              <div id="your-r"></div>
              <div id="isi-r"></div>           
                          </div>
                        </div>
                  </div>
                </section>  
                    </div>
                  </div>
                </div>
              </section>
          </div>
        </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
     <script type="text/javascript">
      $('.star').click(function(){
  //get the id of star
  var star_id = $(this).attr('id');
  var star_index = $(this).attr("id").split("-")[1];
  $("#ratecari").val(star_index);
  switch (star_id){
    case "star-1":
      $("#star-1").addClass('star-checked');
      $("#star-2,#star-3,#star-4,#star-5").removeClass('star-checked');
      break;
    case "star-2":
      $("#star-1,#star-2").addClass('star-checked');
      $("#star-3,#star-4,#star-5").removeClass('star-checked');
      break;
    case "star-3":
      $("#star-1,#star-2,#star-3").addClass('star-checked');
      $("#star-4,#star-5").removeClass('star-checked');
      break;
    case "star-4":
      $("#star-1,#star-2,#star-3,#star-4").addClass('star-checked');
      $("#star-5").removeClass('star-checked');
      break;
    case "star-5":
      $("#star-1,#star-2,#star-3,#star-4,#star-5").addClass('star-checked');
      break;
  }
});
//memilih rating add review
$('.star2').click(function(){
  //get the id of star
  var star_id = $(this).attr('id');
  var star_index = $(this).attr("id").split("-")[1];
  $("#rateid").val(star_index);
  switch (star_id){
    case "star2-1":
      $("#star2-1").addClass('star-checked');
      $("#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
      break;
    case "star2-2":
      $("#star2-1,#star2-2").addClass('star-checked');
      $("#star2-3,#star2-4,#star2-5").removeClass('star-checked');
      break;
    case "star2-3":
      $("#star2-1,#star2-2,#star2-3").addClass('star-checked');
      $("#star2-4,#star2-5").removeClass('star-checked');
      break;
    case "star2-4":
      $("#star2-1,#star2-2,#star2-3,#star2-4").addClass('star-checked');
      $("#star2-5").removeClass('star-checked');
      break;
    case "star2-5":
      $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").addClass('star-checked');
      break;
  }
});


    </script>

</body>

</html>

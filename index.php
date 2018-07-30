<?php

require 'contrep.php';
require 'statistika.php';

?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Reparasi Alat Elektronik</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="js/mystyle.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datetimepicker/datertimepicker.html" />
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>
    <script src="assets/js/chart-master/Chart.js"></script>
	<script src="assets/js/jssor.slider-26.2.0.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="assets/engine1/style.css" />
	<script type="text/javascript" src="assets/engine1/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
	<style type="text/css"> <!--legenda-->
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
        background: brown;
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
  </head>
  
  <body>
   <section id="container" >
   
      <header class="header black-bg"> <!--header-->
             
            <a class="logo"><p><img src="assets/ico/cotai.png">&nbsp&nbsp<b>W</b>EB<b style="font-size: 17px">GIS</b></p></a>
            <a href="admin/login.php" class="logo1" title="Login" style="margin-top: -4px"><img src="assets/ico/112.png"></a>
      </header>
	  
      <aside>
          <div id="sidebar"  class="nav-collapse ">
			<ul class="sidebar-menu" id="nav-accordion">             
                  <!-- <p class="centered"><a href="profile.html"><img src="assets/img/hii.png" class="img-circle" width="130"></a></p> -->
                    <li class="sub-menu">
                      <a href="javascript:;" onclick="home()" >
                          <i class="fa fa-fw fa-dashboard"></i>
                          <span>Home</span>
                      </a>
					</li>

					<li class="sub-menu">               
                      <a href="javascript:;" onclick="resultt();basemap();tempatTampil();kecamatanTampil();">
                          <i class="fa fa-search"></i>
                          <span>Search By</span>
                      </a>
                <ul class="sub">
                <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()">
                          <i class="fa fa-sort-alpha-asc"></i>
                          <span>Nama</span>
                      </a>
                      <ul class="sub">
							<div  class="panel-body" >							  
								<input type="text" class="form-control" id="caritempat" name="caritempat" placeholder="Mencari..." >
								<br>
								<button type="submit" class="btn btn-default" value="caritempat" onclick="carinamatempat()"> <i class="fa fa-search"></i></button>
							</div>
                      </ul>
                </li>

                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()" >
                          <i class="fa fa-cogs"></i>
                          <span>Kecamatan</span>
                      </a>
                      <ul class="sub">
                         <div  class="panel-body" >
                            <select class="form-control" id="kecamatan" >
                                <?php
                                include("connect.php"); 
                                $kecamatan=pg_query("select * from kecamatan ");
                                while($rowkecamatan = pg_fetch_assoc($kecamatan))
                                {
                                echo"<option value=".$rowkecamatan['id_kecamatan'].">".$rowkecamatan['nama_kecamatan']."</option>";
                                }
                                ?>
                            </select> <br>                                
                                <button type="submit" class="btn btn-default" id="caritpkec"  value="cari" onclick="caritpkec()"><i class="fa fa-search"></i></button>
                          </div>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="reset()">
                          <i class="fa fa-institution "></i>
                          <span>Alat Elektronik</span>
                      </a>
                      <ul class="sub">
                          <div  class="panel-body" >
							<select class="form-control" id="produk" >
                              <option value="all">all</option>
                                <?php
                                include("connect.php"); 
                                $produk=pg_query("select * from produk ");
                                while($rowproduk = pg_fetch_assoc($produk))
                                {
                                echo"<option value=".$rowproduk['jenis_elektronik_id'].">".$rowproduk['nama_elektronik']."</option>";
                                }
                                ?>
                            </select>
                                <br><br>                 
                            <select class="form-control" id="merek" >
                                  <option value="all">all</option>
									<?php
									include("connect.php"); 
									$merek=pg_query("select * from merek ");
									while($rowmerek = pg_fetch_assoc($merek))
									{
									echo"<option value=".$rowmerek['merek_id'].">".$rowmerek['nama_merek']."</option>";
									}
									?>
                            </select>
                                <br><br>
                                 <select class="form-control" id="layanan" >
                                  <option value="all">all</option>
									<?php
									include("connect.php"); 
									$layanan=pg_query("select * from layanan ");
									while($rowlayanan = pg_fetch_assoc($layanan))
									{
									echo"<option value=".$rowlayanan['layanan_id'].">".$rowlayanan['nama_layananan']."</option>";
									}
									?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-default" id="cariall"  value="cari" onclick='cariall()'><i class="fa fa-search"></i></button>
						</ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-star"></i>
                          <span>Rating</span>
                      </a>
						  <ul class="sub">
								<div  class="panel-body" >
								<div id="star-container">Rating : 
								<i class="fa fa-star star" id="star-1" onclick=""></i>
								<i class="fa fa-star star" id="star-2"></i>
								<i class="fa fa-star star" id="star-3"></i>
								<i class="fa fa-star star" id="star-4"></i>
								<i class="fa fa-star star" id="star-5"></i>
								</div>
								<input type="text" class="form-control hidden" name="ratecari" id="ratecari" value="">
							  <br>
							  <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='btncarirate()'><i class="fa fa-search"></i></button>
						  </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-clock-o"></i>
                          <span> Jadwal Operasional</span>
                      </a>
							<ul class="sub">
							<div  class="panel-body" >							  
								<input class="form-control" type="time" name="jamcari" id="jamcari" >
								<button type="submit" id="btncarijam" class="btn btn-default" onclick="btncarijam()"><i class="fa fa-search"></i></button>
								</script>                      
							</div>
							</ul>
                  </li>  
                </ul>
              </li>                   
                
                  <li class="sub-menu">
                      <a href="javascript:;" onclick="list()" >
                          <i class="fa fa-file-image-o"></i>
                          <span>Daftar Tempat Reparasi</span>
                      </a>
                  </li>    
			</ul>

		  </div>
		</aside>

      <section id="main-content">
      <section style="padding-top: 100px">
		<div class="row mt">
			<div class="col-sm-12" id="home" >
				<section class="panel">
				  <div class="panel-body">
				  <div class="row">
				  <div id="wowslider-container1">
				<div class="ws_images"><ul>
					<li><img src="img/001.jpg" alt="instal ulang" title="instal ulang" id="wows1_0"/></li>
					<li><img src="img/002.jpg" alt="servis" title="servis" id="wows1_1"/></li>
					<li><img src="img/003.jpg" alt="ganti" title="ganti komponen" id="wows1_0"/></li>
					<li><img src="img/004.jpg" alt="instal ulang" title="instal ulang" id="wows1_1"/></li>
					<li><img src="img/005.jpg" alt="servis" title="servis" id="wows1_0"/></li>
					<li><img src="img/006.jpg" alt="ganti" title="ganti komponen" id="wows1_1"/></li>
					<li><img src="img/007.jpg" alt="instal ulang" title="instal ulang" id="wows1_0"/></li>
					<li><img src="img/008.jpg" alt="servis" title="servis" id="wows1_1"/></li>
					<li><img src="img/009.jpg" alt="ganti" title="ganti komponen" id="wows1_0"/></li>
					<li><img src="img/0010.jpg" alt="instal ulang" title="instal ulang" id="wows1_1"/></li>
					<li><a href="http://wowslider.net"><img src="img/003.jpg" alt="jquery carousel slider" title="alat elektronik-rusak" id="wows1_2"/></a></li>
					<li><img src="data1/images/service_komputer_murah_di_serpong.jpg" alt="daftar toko servis alat elektronik di kota padang" title="daftar toko servis alat elektronik di kota padang" id="wows1_3"/></li>
				</ul></div>
				  <div class="ws_bullets"><div>
					<a href="#" title="instal ulang"><span><img src="data1/tooltips/download.jpg" alt="instal ulang"/>1</span></a>
					<a href="#" title="servis"><span><img src="data1/tooltips/jasa.jpg" alt="servis"/>2</span></a>
					<a href="#" title="ganti komponen"><span><img src="data1/tooltips/pcrusak.jpg" alt="ganti"/>3</span></a>
					<a href="#" title="service komputer murah di serpong"><span><img src="data1/tooltips/service_komputer_murah_di_serpong.jpg" alt="daftar toko servis alat elektronik di kota padang"/>4</span></a></div>
				  </div>
				  <div class="ws_script" style="position:absolute;left:-99%"><a href="/">image slider</a> by Coti</div>
				  <div class="ws_shadow"></div>
				</div>  
				<script type="text/javascript" src="assets/engine1/wowslider.js"></script>
				<script type="text/javascript" src="assets/engine1/script.js"></script>
						</div>          
					</div>    
				</section>
			</div>
		</div>
            
            <div class="col-sm-8" id="hide2">
              <section class="panel">
                    <header class="panel-heading">      
                      <div class="col-lg-8">
                        Google Map with Location List
						<a class="btn btn-default" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Posisi Sekarang"><i class="fa fa-map-marker" style="color:black;"></i></a>
						<a class="btn btn-default" role="button" data-toggle="collapse" onclick="manualLocation()" title=" Posisi Manual "><i class="fa fa-location-arrow" style="color:black;"></i></a>
						<a class="btn btn-default" role="button" data-toggle="collapse" href="#terdekat" title="Terdekat" aria-controls="terdekat"><i class="fa fa-road" style="color:black;"></i></a>
						<a class="btn btn-default" role="button" data-toggle="collapse" onclick="tampilsemua();resultt()" title="semua tempat reparasi" aria-controls="terdekat"><i class="fa fa-cube" style="color:black;"></i></a></div>
						<div class="col-lg-3" id="tombol">
						<a class="btn btn-default" role="button" data-toggle="collapse" id="showlegenda" onclick="legenda()" title="legenda" aria-controls=""><i class="fa fa-eye" style="color:black;"></i></a>
						</div> <br><br>
						<label></label>         
                    <div class="collapse" id="terdekat">
						<div class="well">
						<label style="color:black">Radius (Km)</label><br>
						<input  type="range" onclick="aktifkanRadius();resultt()" id="inputradius" name="inputradius" data-highlight="true" min="1" max="15" value="1" >
						</div>
					</div>
               </h3>
                    </header>
                      <div class="panel-body">
                          <div id="map" style="width:100%;height:400px; z-index:50"></div>
                      </div>
                      
			  </section>
            </div>
           
              <div class="col-sm-4" id="result">
				<section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Result</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
             
                      <div class="form-group" id="hasilcari1" style="display:none;">
                        <table class="table table-bordered" id='hasilcari'>
                        </table>  
                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>
          </div>
        </section>   
      </section>
     </div>
	 
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Informasi [ <i id="titleI"></i> ]</h4>
							</div>
							<div class="modal-body" style="max-height:500px;overflow:auto">
								<table class="table" id='info'>
									<!--<tbody  style='vertical-align:top;'>
									</tbody> -->
									<tr></tr>
								</table>
								</br>
								<div class="panel-body" style=" " id='ratings'>
								<div id='sob'><center></center></div>
								<div class="box-body" style="">
								  <div id="det-r" style="display:block;">
									<div id="addreview" style="clear:both;">
									  <input type="text" name="gidr" id="gidr" value="" hidden="">                                       
									  <div id="star-containerz">Rating : 
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
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
				
                <div class="col-sm-8" style="display:none;" id="infoo">
					<section class="panel">
						<div class="panel-body">
							<a class="btn btn-compose">Information</a>
						<div class="box-body" style="max-height:350px;overflow:auto;">
				 
							<div class="form-group">
								<table class="table" id='infos'>
								<tbody  style='vertical-align:top;'>
								</tbody> 
								</table> 
				
							</div> 
						</div>
						</div>
					</section>
                </div>

                <div class="col-sm-8" style="display:none;" id="infoo1">
				<section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Route Public Transportation</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">            
						  <div class="form-group">
							<table class="table table-bordered" id='infoak'>
							</table>             
						  </div>             
						</div>
                    </div>
                </section>
                </div>
					<div class="col-md-3"></div>
					<div id="routeShows" style="display:none;" class="col-md-6" >
						<section class="panel">
							<div class="panel-body" >
								<div  class="col-md-12"><i style="height:35px;" class="btn btn-success col-md-11">Route</i><i style="height:35px;" class="btn btn-success fa fa-close col-md-1" onClick="endRoute()" ></i>
								</div>
								<div class="col-md-12 box-body" style="max-height:350px;overflow:auto;">
								<div class="form-group" id='detailrute'></div>                  
								</div>
							</div>
						</section>
					</div>             
			<div class="row mt" style="display:none;" id="showlist" >  
				<?php 
				include 'connect.php';
				$sql = pg_query("SELECT * FROM toko_reparasi");
				 ?>
				<?php
				  $jml_kolom=3;
				  $cnt = 1;
				  while($data =  pg_fetch_assoc($sql)){
					if ($cnt >= $jml_kolom) 
					{
						  echo "<div class='row mt mb' >";
					} 
				?>
  <div class="row-mt">
    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-6 desc">
    <div class="project-wrapper">
      <div class="project">
        <div class="photo-wrapper">
          <div class="photo">
            <a class="fancybox" href="foto/<?php echo $data['foto']; ?>"><img class="img-responsive" src="foto/<?php echo $data['foto']; ?>" alt=""></a>
          </div>
          <div class="overlay"></div>
          <p style="color: #f3fff4"><?php echo $data['nama_toko_repair']; ?><br><?php echo $data['alamat']; ?></p>
        </div>
      </div>      
    </div>      
  </div>
     </div>
      
  <?php
  if ($cnt >= $jml_kolom) 
    {          
          $cnt = 0;
      echo "</div>";
    }
    $cnt++;
  }
  ?>
        </div>
    </section>
         

  </section>
     <!-- <footer class="site-footer">
          <div class="text-center">
              13115201028 - Desyolawati
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer> -->
  </section>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/fancybox/jquery.fancybox.js"></script>    
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="script.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
  
  <script type="text/javascript" src="assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script> 
  <script src="assets/js/advanced-form-components.js"></script>  
  
   <script type="text/javascript">
   var id_cek = 0;
	function r(){
		 console.log('de ga Coti ya');
		 $('.fa-info').click(function(){
		  console.log('hy, atashi no namae wa Coti desu');
		  $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
	  });
	}
     
   
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

   <!--common script for all pages-->
  <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Statistik Pengunjung',
            // (string | mandatory) the text inside the notification
            text: ' <span>Today : <?php echo $pengunjung; ?> <br> Total : <?php echo $totalpengunjung; ?> <br> Online User : <?php echo $pengunjungonline; ?> </span>',
            // (string | optional) the image to display on the left
            image: 'assets/img/1.ico',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });
        return false;
        });
  </script>
    
    <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  </body>
</html>

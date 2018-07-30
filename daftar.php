<?php

require 'contrep.php';
require 'statistika.php';

?>
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

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body >

    <div id="wrapper">

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
                <a class="navbar-brand" href="index.html" >REPARASI ALAT ELEKTRONIK</a>
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
                                <a href="kecamatan_2.php">Kecamatan</a>
                            </li>
                            <li>
                                <a href="elektronik.php">Alat Elektronik</a>
                            </li>
                             <li>
                                <a href="rating.php">Rating</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="daftar.php" data-target="#demo"><i class="fa fa-list-ul"></i> Daftar Tempat Reparasi </a>
                      
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Reparasi Elektronik</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->
                 <div class="row">
                 	<?php 
    				include 'connect.php';
   					 $sql = pg_query("SELECT * FROM toko_reparasi");
    				 ?>
					<?php
  					$jml_kolom=4;
 					 $cnt = 1;
  					while($data =  pg_fetch_assoc($sql)){
		if ($cnt >= $jml_kolom) 
		{
          echo "<div class='panel panel-red'>";
		}
 		  ?>
            
                <div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                           <h3 style="color:#000000;align:center"><?php echo $data['nama_toko_repair']; ?></h3>
                        </div>
                        <div class="panel-body">
                           <a class="" href="foto/<?php echo $data['foto']; ?>"><img class=""  height="100px"
align="right" border="5"src="foto/<?php echo $data['foto']; ?>" alt=""></a>
                        </div>
                        <div class="panel-footer" >
                          <p style="color:#000000"><br><?php echo $data['alamat']; ?></p>
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

        </div>
               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

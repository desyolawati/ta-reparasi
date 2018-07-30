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

        
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <!-- Animate -->
    <link rel="stylesheet" href="daftar/css/animate.css">
    <!-- Icomoon -->
    <link rel="stylesheet" href="daftar/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="daftar/css/bootstrap.css">

    <link rel="stylesheet" href="daftar/css/style.css">


    <!-- Modernizr JS -->
    <script src="../daftar/js/modernizr-2.6.2.min.js"></script>

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
                                <a href="#">Angkutan Umum</a>
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

            <div class="container-fluid">

                    <div class="container-fluid">
        <div class="row fh5co-post-entry">
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_1.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Food &amp; Drink</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">We Eat and Drink All Night</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_2.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Food &amp; Drink</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">Beef Steak at Guatian Restaurant</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <div class="clearfix visible-xs-block"></div>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_3.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Travel</a>, <a href="single.html">Style</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">An Overlooking River at the East Cost</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_4.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Travel</a>, <a href="single.html">Style</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">A Wildlife In The Mountain of India</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_5.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Photography</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">We Took A Photo</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_6.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Travel</a>, <a href="single.html">Style</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">A Modernize Huge and Beautiful Building</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <div class="clearfix visible-xs-block"></div>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_7.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Food &amp; Drinks</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">Enjoying the Native Juice Drink in Brazil</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_8.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Travel</a>, <a href="single.html">Style</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">Boat Travel in The Vietnam River</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>



            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_1.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Food &amp; Drink</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">We Eat and Drink All Night</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_2.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Food &amp; Drink</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">Beef Steak at Guatian Restaurant</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <div class="clearfix visible-xs-block"></div>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_3.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Travel</a>, <a href="single.html">Style</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">An Overlooking River at the East Cost</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_4.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Travel</a>, <a href="single.html">Style</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">A Wildlife In The Mountain of India</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_5.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Photography</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">We Took A Photo</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_6.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Travel</a>, <a href="single.html">Style</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">A Modernize Huge and Beautiful Building</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <div class="clearfix visible-xs-block"></div>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_7.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Food &amp; Drinks</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">Enjoying the Native Juice Drink in Brazil</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <a href="single.html"><img src="images/pic_8.jpg" alt="Image" class="img-responsive"></a>
                </figure>
                <span class="fh5co-meta"><a href="single.html">Travel</a>, <a href="single.html">Style</a></span>
                <h2 class="fh5co-article-title"><a href="single.html">Boat Travel in The Vietnam River</a></h2>
                <span class="fh5co-meta fh5co-date">March 6th, 2016</span>
            </article>
            <div class="clearfix visible-xs-block"></div>
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
        <!-- jQuery -->
    <script src="daftar/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="daftar/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="daftar/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="daftar/js/jquery.waypoints.min.js"></script>
    <!-- Main JS -->
    <script src="daftar/js/main.js"></script>

</body>

</html>

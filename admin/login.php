<?php 
session_start();
if(isset($_SESSION['admin'])){
    echo"<script language='JavaScript'>document.location='index.php'</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 </head>

<body>
<div class="wrapper">
        <br><br>
        <header class="main-header">
          <center><span class="logo" style="width:100%;text-align:left;font-size:16px"><b>GIS Toko Reparasi Kota Padang</b>
           </span>
       </center>
        </header>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="act/session.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-theme btn-block" type="submit" name="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                                <p class="text-center">Belum punya akun? <a href="register.php">Daftar</a></p>
                                <input type="hidden" name="_form" value="on">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
     <script>
        $.backstretch("../assets/img/ss.jpg", {speed: 500});
    </script>
</body>

</html>

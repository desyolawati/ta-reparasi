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

    <div class="container">
        <div class="row">
    
<div class="col-md-4"></div>
<div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="text-center">REGISTRASI USER</h3></div>
        <div class="panel-body">
            <form action="act/daftar.php" method="POST">
        <?php
          include ('inc/connect.php');
          $query = pg_query("SELECT MAX(id) AS id FROM login");
          $result = pg_fetch_array($query);
          $idmax = $result['id'];
          if ($idmax==null) {$idmax=1;}
          else {$idmax++;}
        ?>
        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $idmax;?>">
                <div class="form-group">
                    <label for="nama">User Name </label>
                    <input type="text" name="nama" class="form-control" placeholder="User Name">
                </div>
                <div class="form-group">
                    <label for="role">Peran</label>
                    <select name="role" class="form-control" >
                    <option value="1">Admin Kantor</option>
                    <option value="2">Admin Toko</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                <input type="hidden" name="_form" value="on">
            </form>
        </div>
    </div>
</div>
<div class="col-md-4"></div>
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

</body>

</html>

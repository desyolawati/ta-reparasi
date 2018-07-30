<?php
include ('../inc/connect.php');
$toko_id = $_POST['toko_id'];
$layanan_id = $_POST['layanan_id'];
$layanan = $_POST['layanan'];


$sqldel = "delete from layanan_toko_reparasi where toko_id='$toko_id'";
$delete = pg_query($sqldel);


$countl = count($layanan);
$sqll   = "insert into layanan_toko_reparasi (toko_id, layanan_id) VALUES ";
for( $i=0;$i<$countl;$i++){
	$sqll .= "('{$toko_id}','{$layanan[$i]}')";
	$sqll .= ",";
}
$sqll = rtrim($sqll,",");
$insert = pg_query($sqll);

if ($insert ){
	echo "<script>
		alert (' Data Successfully Change');
		</script>";
	header("location:../index1.php?page=formlay");
}
else{
	echo 'error';
}

?>
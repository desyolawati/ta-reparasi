<?php
include ('../inc/connect.php');
$toko_id = $_POST['toko_id'];


$sqldel = "DELETE FROM det_toko_produk where toko_id=$toko_id";
$delete = pg_query($sqldel);

$countl = count($merek_id);
$count2 = count($jenis_elektronik_id);
$sqll   = "insert into layanan_bengkel (gid, layanan_id) VALUES ";
for( $i=0; $i < $countl; $i++ ){
	$sqll .= "('{$gid}','{$layanan[$i]}')";
	$sqll .= ",";
}
$sqll = rtrim($sqll,",");
$insert = pg_query($sqll);
if ($insert && $delete){
	header("location:../?page=detail&toko_id=$toko_id");
}
else{
	echo 'error';
	header("location:../?page=detail&toko_id=$toko_id");
}

?>
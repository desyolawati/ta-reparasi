<?php
include ('../inc/connect.php');
$id = $_POST['id'];
$hari = $_POST['hari'];
$buka = $_POST['buka'];
$tutup = $_POST['tutup'];

$counth = count($hari);
$sqlj   = "insert into jam_kerja (gid, hari_id, jam_buka, jam_tutup) VALUES ";
 
for( $i=0; $i < $counth; $i++ ){
	$sqlj .= "('{$id}','{$hari[$i]}','{$buka[$i]}','{$tutup[$i]}')";
	$sqlj .= ",";
}
$sqlj = rtrim($sqlj,",");
$insert = pg_query($sqlj);

if ($insert){
			header("location:../?page=listdata");
	}
	
else {
	echo 'error';
}
?>
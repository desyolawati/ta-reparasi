<?php
include ('../inc/connect.php');

$query = pg_query("SELECT MAX(merek_id) AS id FROM merek");
$result = pg_fetch_array($query);
$idmax = $result['id'];
if ($idmax==null) {$idmax=1;}
else {$idmax++;}
$merek = $_POST['merek'];
//cek
$count = count($merek);
$sql  = "insert INTO merek(merek_id, nama_merek) VALUES ";
 
for( $i=0; $i < $count; $i++ ){
	$sql .= "('{$idmax}','{$merek[$i]}')";
	$sql .= ",";
	$idmax++;
}
$sql = rtrim($sql,",");
$insert = pg_query($sql);

if ($sql){
	header("location:../?page=dafmer");
}else{
	echo 'error';
}


?>
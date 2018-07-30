<?php
include ('../inc/connect.php');

$query = pg_query("SELECT MAX(jenis_elektronik_id) AS id FROM produk");
$result = pg_fetch_array($query);
$idmax = $result['id'];
if ($idmax==null) {$idmax=1;}
else {$idmax++;}
$produk = $_POST['produk'];

$count = count($produk);
$sql  = "insert INTO produk(jenis_elektronik_id, nama_elektronik) VALUES ";
 
for( $i=0; $i < $count; $i++ ){
	$sql .= "('{$idmax}','{$produk[$i]}')";
	$sql .= ",";
	$idmax++;
}
$sql = rtrim($sql,",");
$insert = pg_query($sql);

if ($sql){
	header("location:../?page=dafprod");
}else{
	echo 'error';
}


?>
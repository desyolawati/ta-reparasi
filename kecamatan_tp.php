<?php
require 'connect.php';

$kecamatan_id=$_GET['kecamatan'];
$querysearch = pg_query("SELECT 
	toko_reparasi.toko_id,
	toko_reparasi.nama_toko_repair,
	toko_reparasi.geom,
	st_x(st_centroid(toko_reparasi.geom)) as longitude,
	st_y(st_centroid(toko_reparasi.geom)) as latitude 
	from toko_reparasi, kecamatan 
	WHERE st_contains(kecamatan.geom, toko_reparasi.geom) and kecamatan.id_kecamatan='$kecamatan_id'
	");

while ($row=pg_fetch_assoc($querysearch)) 
$data[]=$row;
echo $_GET['jsoncallback'].''.json_encode($data).'';
?>

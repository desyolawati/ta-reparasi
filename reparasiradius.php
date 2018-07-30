<?php
include('connect.php');
$latit=$_GET["lat"];
$longi=$_GET["lng"];
$rad=$_GET["rad"];

$querysearch=" SELECT toko_id, nama_toko_repair,st_x(st_centroid(geom)) as lon,st_y(st_centroid(geom)) as lat,
	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), toko_reparasi.geom) as jarak 
	FROM toko_reparasi where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
	toko_reparasi.geom) <= ".$rad."ORDER BY jarak
			 "; 
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $toko_id=$row['toko_id'];
		  $nama_toko_repair=$row['nama_toko_repair'];
		  $longitude=$row['lon'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('toko_id'=>$toko_id,'nama_toko_repair'=>$nama_toko_repair,
		  'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
<?php
require 'connect.php';

$id_kecamatan=$_GET['id_kecamatan'];
$querysearch="	SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT id_kecamatan, geom, warna, ST_X(ST_Centroid(geom)) AS lon, ST_Y(ST_CENTROID(geom)) As lat) As l )) As properties 
				FROM kecamatan where id_kecamatan='$id_kecamatan' 
				) As f ) As fc
			  ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>

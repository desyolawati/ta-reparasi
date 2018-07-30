<?php
require '../inc/connect.php';
$toko_id=$_GET['toko_id'];
$querysearch=" SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(a.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT toko_id,  nama_toko_repair) As l )) As properties 
				FROM toko_reparasi As a where toko_id=$toko_id 
				) As f ) As fc

			  ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$load=$data['row_to_json'];
	}
	echo $load;
?>
<?php 

include ('connect.php');

		$sql = "select(select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 1) as lk,
(select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 2) as pauh, (select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 3) as ps, (select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 4) as lb, (select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 5) as pt, (select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 6) as kur, (select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 7) as nangg, (select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 8) as pb, (select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 9) as pu, (select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 10) as ptka, (select count(*) from toko_reparasi, kecamatan where st_contains(kecamatan.geom, toko_reparasi.geom) AND kecamatan.id_kecamatan= 11) as kt
				";
				$query = pg_query($sql);
		
		if(pg_num_rows($query)>0){
			$data = pg_fetch_assoc($query);
			return $data;
		}
		

 ?>


	
	
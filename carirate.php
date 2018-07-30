<?php
require 'connect.php';
$rate=$_GET["rate"];
date_default_timezone_set('Asia/Jakarta');
$day=date("w");
if ($rate==1){
	$querysearch="select toko_id, nama_toko_repair, geom, alamat, no_telepon,  deskripsi, (select jam_buka from jam_kerja where jam_kerja.gid=toko_reparasi.toko_id and hari_id=$day), (select jam_tutup from jam_kerja where jam_kerja.gid=toko_reparasi.toko_id and hari_id=$day),ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from  rating right join toko_reparasi on rating.gid=toko_reparasi.toko_id group by toko_reparasi.toko_id having avg(rating) <= 1 or avg(rating) is null";
}else{
	$querysearch="select toko_id, nama_toko_repair, geom, alamat, no_telepon,  deskripsi,(select jam_buka from jam_kerja where jam_kerja.gid=toko_reparasi.toko_id and hari_id=$day),(select jam_tutup from jam_kerja where jam_kerja.gid=toko_reparasi.toko_id and hari_id=$day),ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from rating right join toko_reparasi on rating.gid=toko_reparasi.toko_id  group by toko_reparasi.toko_id having avg(rating) <= $rate and avg(rating) > $rate-1";
}
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$toko_id=$row['toko_id'];
		$nama_toko_repair=$row['nama_toko_repair'];
		$alamat=$row['alamat'];
		$no_telepon=$row['no_telepon'];
		$deskripsi=$row['deskripsi'];
		$jam_buka=$row['jam_buka'];
		$jam_tutup=$row['jam_tutup'];
		$longitude=$row['lng'];
		$latitude=$row['lat'];

		$dataarray[]=array('toko_id'=>$toko_id,'nama_toko_repair'=>$nama_toko_repair,'alamat'=>$alamat,'no_telepon'=>$no_telepon,'deskripsi'=>$deskripsi,'jam_buka'=>$jam_buka,'jam_tutup'=>$jam_tutup,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
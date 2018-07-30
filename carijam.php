<?php
require 'connect.php';
$jamcari=$_GET["jam"];
/* $jamcari='09:00:00';
echo $jamcari; */
date_default_timezone_set('Asia/Jakarta');
$day=date("w");


$querysearch="SELECT toko_id, nama_toko_repair, alamat, no_telepon, foto, deskripsi, jam_buka, jam_tutup,
       pemilik,ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat FROM toko_reparasi join jam_kerja on jam_kerja.gid=toko_reparasi.toko_id where jam_buka<='$jamcari' and jam_tutup>='$jamcari' and hari_id=$day";
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$toko_id=$row['toko_id'];
		$nama_toko_repair=$row['nama_toko_repair'];
		$alamat=$row['alamat'];
		$no_telepon=$row['no_telepon'];
		$deskripsi=$row['deskripsi'];
		$pemilik=$row['pemilik'];
		$jam_buka=$row['jam_buka'];
		$jam_tutup=$row['jam_tutup'];
		$longitude=$row['lng'];
		$latitude=$row['lat'];

		$dataarray[]=array('toko_id'=>$toko_id,'nama_toko_repair'=>$nama_toko_repair,'alamat'=>$alamat,'no_telepon'=>$no_telepon,'pemilik'=>$pemilik,'deskripsi'=>$deskripsi,'jam_buka'=>$jam_buka,'jam_tutup'=>$jam_tutup,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
<?php
require 'connect.php';
$cari = $_GET["cari"];
date_default_timezone_set('Asia/Jakarta');
$day=date("w");

$querysearch ="select toko_id, hari, nama_toko_repair, alamat, no_telepon, deskripsi, foto, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat, pemilik, jam_buka,jam_tutup from toko_reparasi as tr join jam_kerja as jk on jk.gid=tr.toko_id join hari as hr on hr.hari_id=jk.hari_id where tr.toko_id=$cari and jk.hari_id=$day";	   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $toko_id=$row['toko_id'];
		  $nama_toko_repair=$row['nama_toko_repair'];
		  $alamat=$row['alamat'];
		  $no_telepon=$row['no_telepon'];
		  $deskripsi=$row['deskripsi'];
		  $foto=$row['foto'];
		  $pemilik=$row['pemilik'];
		  $jam_buka=$row['jam_buka'];
		  $jam_tutup=$row['jam_tutup'];
		  $hari=$row['hari'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $dataarray[]=array('toko_id'=>$toko_id,'nama_toko_repair'=>$nama_toko_repair,'alamat'=>$alamat, 'no_telepon'=>$no_telepon, 'deskripsi'=>$deskripsi, 'foto'=>$foto ,'pemilik'=>$pemilik,'jam_buka'=>$jam_buka,'jam_tutup'=>$jam_tutup,'hari'=>$hari,'longitude'=>$longitude,'latitude'=>$latitude);

		  if ($foto=='null' || $foto=='' || $foto==null){
		$foto='foto.jpg';
	}
	}
echo json_encode ($dataarray);
?>

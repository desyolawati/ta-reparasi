
<?php
require 'connect.php';

$cari_tempat = $_GET["cari_tempat"];
 

$querysearch	=" SELECT distinct a.toko_id,a.nama_toko_repair,a.alamat, a.no_telepon, a.deskripsi,ST_X(ST_Centroid(a.geom)) AS longitude, ST_Y(ST_CENTROID(a.geom)) As latitude
          FROM toko_reparasi as a where upper(a.nama_toko_repair) like upper('%$cari_tempat%')
				";
			   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $toko_id=$row['toko_id'];
          $nama_toko_repair=$row['nama_toko_repair'];
          $alamat=$row['alamat'];
          $no_telepon=$row['no_telepon'];
          $deskripsi=$row['deskripsi'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('toko_id'=>$toko_id,'nama_toko_repair'=>$nama_toko_repair, 'alamat'=>$alamat, 'no_telepon'=>$no_telepon, 'deskripsi'=>$deskripsi,  'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode ($dataarray);
?>
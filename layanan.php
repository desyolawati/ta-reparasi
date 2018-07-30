<?php
require 'connect.php';
$toko_id = $_GET["toko_id"];
$querysearch=" select *FROM det_layanan join layanan on layanan.layanan_id=det_layanan.id_layanan where toko_id=$toko_id";
			   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$nama_layananan=$row['nama_layananan'];
		$dataarray[]=array('nama_layananan'=>$nama_layananan);
	}
echo json_encode ($dataarray);
?>

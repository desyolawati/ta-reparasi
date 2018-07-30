<?php
require 'connect.php';
$toko_id = $_GET["toko_id"];
$querysearch="select distinct nama_elektronik FROM produk join det_merek on produk.jenis_elektronik_id=det_merek.jenis_elektronik_id join merek on merek.merek_id=det_merek.merek_id where toko_id=$toko_id";
			   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$nama_elektronik=$row['nama_elektronik'];
		//$nama_merek=$row['nama_merek'];
		$dataarray[]=array('nama_elektronik'=>$nama_elektronik);
	}
echo json_encode ($dataarray);
?>

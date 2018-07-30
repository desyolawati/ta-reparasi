<?php
require 'connect.php';

$produk=$_GET['produk'];
$merek=$_GET['merek'];
$layanan=$_GET['layanan'];

if ($produk=='all' && $merek=='all' && $layanan=='all')
{
	$querysearch = pg_query("select distinct tr.toko_id, tr.nama_toko_repair, st_x(st_centroid(tr.geom)) as longitude,
	st_y(st_centroid(tr.geom)) as latitude , tr.foto, tr.alamat,  mk.nama_merek,p.nama_elektronik from toko_reparasi as tr left join det_toko_produk as dtp on tr.toko_id = dtp.toko_id  left join merek as mk on mk.merek_id = dtp.merek_id left join produk as p on p.jenis_elektronik_id=dtp.jenis_elektronik_id left join layanan_toko_reparasi as ltr on ltr.layanan_id=tr.toko_id left join layanan as l on l.layanan_id=ltr.layanan_id ");

while ($row=pg_fetch_assoc($querysearch)) 
$data[]=$row;
echo $_GET['jsoncallback'].''.json_encode($data).'';
}

else if ($produk!='all' && $merek=='all' && $layanan=='all')
{

	$querysearch1 = pg_query("select distinct tr.toko_id, tr.nama_toko_repair, st_x(st_centroid(tr.geom)) as longitude,
	st_y(st_centroid(tr.geom)) as latitude , tr.foto, tr.alamat,  mk.nama_merek,p.nama_elektronik from toko_reparasi as tr left join det_toko_produk as dtp on tr.toko_id = dtp.toko_id  left join merek as mk on mk.merek_id = dtp.merek_id left join produk as p on p.jenis_elektronik_id=dtp.jenis_elektronik_id left join layanan_toko_reparasi as ltr on ltr.layanan_id=tr.toko_id left join layanan as l on l.layanan_id=ltr.layanan_id where p.jenis_elektronik_id='$produk' ");

while ($row2=pg_fetch_assoc($querysearch1)) 
$data1[]=$row2;
echo $_GET['jsoncallback'].''.json_encode($data1).'';

}
else if ($produk!='all' && $merek!='all' && $layanan=='all')
{
		$querysearch2 = pg_query("select distinct tr.toko_id, tr.nama_toko_repair, st_x(st_centroid(tr.geom)) as longitude,
	st_y(st_centroid(tr.geom)) as latitude , tr.foto, tr.alamat,  mk.nama_merek,p.nama_elektronik from toko_reparasi as tr left join det_toko_produk as dtp on tr.toko_id = dtp.toko_id  left join merek as mk on mk.merek_id = dtp.merek_id left join produk as p on p.jenis_elektronik_id=dtp.jenis_elektronik_id left join layanan_toko_reparasi as ltr on ltr.layanan_id=tr.toko_id left join layanan as l on l.layanan_id=ltr.layanan_id where p.jenis_elektronik_id='$produk'AND mk.merek_id = '$merek' ");

while ($row3=pg_fetch_assoc($querysearch2)) 
$data2[]=$row3;
echo $_GET['jsoncallback'].''.json_encode($data2).'';
}

else if ($produk!='all' && $merek!='all' && $layanan!='all')
{
		$querysearch23 = pg_query("select distinct tr.toko_id, tr.nama_toko_repair, st_x(st_centroid(tr.geom)) as longitude,
	st_y(st_centroid(tr.geom)) as latitude , tr.foto, tr.alamat,  mk.nama_merek,p.nama_elektronik from toko_reparasi as tr left join det_toko_produk as dtp on tr.toko_id = dtp.toko_id  left join merek as mk on mk.merek_id = dtp.merek_id left join produk as p on p.jenis_elektronik_id=dtp.jenis_elektronik_id left join layanan_toko_reparasi as ltr on ltr.layanan_id=tr.toko_id left join layanan as l on l.layanan_id=ltr.layanan_id where p.jenis_elektronik_id='$produk'AND mk.merek_id = '$merek' AND l.layanan_id='$layanan'");

while ($row4=pg_fetch_assoc($querysearch23)) 
$data3[]=$row4;
echo $_GET['jsoncallback'].''.json_encode($data3).'';
}


else if ($produk=='all' && $merek!='all' && $layanan=='all')
{

		$querysearch4 = pg_query("select distinct tr.toko_id, tr.nama_toko_repair, st_x(st_centroid(tr.geom)) as longitude,
	st_y(st_centroid(tr.geom)) as latitude , tr.foto, tr.alamat,  mk.nama_merek,p.nama_elektronik from toko_reparasi as tr left join det_toko_produk as dtp on tr.toko_id = dtp.toko_id  left join merek as mk on mk.merek_id = dtp.merek_id left join produk as p on p.jenis_elektronik_id=dtp.jenis_elektronik_id left join layanan_toko_reparasi as ltr on ltr.layanan_id=tr.toko_id left join layanan as l on l.layanan_id=ltr.layanan_id where mk.merek_id = '$merek'");

while ($row4=pg_fetch_assoc($querysearch4)) 
$data5[]=$row4;
echo $_GET['jsoncallback'].''.json_encode($data5).'';

}
else if ($produk=='all' && $merek=='all' && $layanan!='all')
{
	$querysearch5 = pg_query("select distinct tr.toko_id, tr.nama_toko_repair, st_x(st_centroid(tr.geom)) as longitude,
	st_y(st_centroid(tr.geom)) as latitude , tr.foto, tr.alamat,  mk.nama_merek,p.nama_elektronik from toko_reparasi as tr left join det_toko_produk as dtp on tr.toko_id = dtp.toko_id  left join merek as mk on mk.merek_id = dtp.merek_id left join produk as p on p.jenis_elektronik_id=dtp.jenis_elektronik_id left join layanan_toko_reparasi as ltr on ltr.layanan_id=tr.toko_id left join layanan as l on l.layanan_id=ltr.layanan_id where l.layanan_id='$layanan'");

while ($row5=pg_fetch_assoc($querysearch5)) 
$data6[]=$row5;
echo $_GET['jsoncallback'].''.json_encode($data6).'';
   
}
?>

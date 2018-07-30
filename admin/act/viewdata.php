 <?php
include ('inc/connect.php');
$toko_id = $_GET["toko_id"];
$username = $_SESSION["username"];

$query = "select distinct tr.toko_id, tr.nama_toko_repair, hari.hari, jk.jam_buka, jk.jam_tutup, tr.deskripsi,tr.no_telepon,st_x(st_centroid(tr.geom)) as longitude,
    st_y(st_centroid(tr.geom)) as latitude , tr.foto, tr.alamat,ly.nama_layananan, p.nama_elektronik, mk.nama_merek from layanan as ly left join layanan_toko_reparasi as dln on dln.layanan_id=ly.layanan_id left join toko_reparasi as tr on tr.toko_id=dln.toko_id left join det_toko_produk as dtp on tr.toko_id = dtp.toko_id left join produk as p on p.jenis_elektronik_id = dtp.jenis_elektronik_id left join merek as mk on mk.merek_id = dtp.merek_id left join jam_kerja as jk on jk.gid=tr.toko_id left join hari on  hari.hari_id=jk.hari_id left join login as l on l.toko_id=tr.toko_id where l.username='$username'";
$hasil=pg_query($query);
while($row = pg_fetch_array($hasil)){
  $toko_id=$row['toko_id'];
  $nama_toko_repair=$row['nama_toko_repair'];
  $foto=$row['foto'];
  $alamat=$row['alamat'];
  $deskripsi=$row['deskripsi'];
  $no_telepon=$row['no_telepon'];
  $nama_layanan=$row['nama_layanan'];
  $nama_elektronik=$row['nama_elektronik'];
  $nama_merek=$row['nama_merek'];
  $hari=$row['hari'];

  $latitude=$row['latitude'];
  $longitude=$row['longitude'];
  $jam_buka=$row['jam_buka'];
  $b=substr($jam_buka,0,-3);
  $jam_tutup=$row['jam_tutup'];
  $t=substr($jam_tutup,0,-3);
  $buka = strtotime($jam_buka);
  $newbuka = date('H:i:s',$buka);
  $tutup = strtotime($jam_tutup);
  $newtutup = date('H:i:s',$tutup);
  $now = date('H:i:s');

  if($now >= $newbuka && $now <= $newtutup){
  $stat='Buka';
  $warna='blue';
  }else{
  $stat='Tutup';
  $warna='red';
  }
  if ($latitude=='' || $longitude==''){
    $latitude='<span style="color:red">Kosong</span>';
    $longitude='<span style="color:red">Kosong</span>';
  }
  

  if ($foto=='null' || $foto=='' || $foto==null){
    $foto='eror.jpg';
  }
}
  ?>
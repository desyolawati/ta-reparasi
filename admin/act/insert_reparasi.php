<?php

include ('../inc/connect.php');
$id = $_POST['id'];
$id_toko_produk = $_POST['id_toko_produk'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$deskripsi = $_POST['deskripsi'];
$geom = $_POST['geom'];
$pemilik = $_POST['pemilik'];
$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 600000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$id.'_'.$sourcename;
		$filepath="../../foto/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
	} else if ($foto=='null' || $foto=='' || $foto==null){
		$foto='foto.jpg';
	}
$layanan_id = $_POST['layanan_id']; 
$jenis_elektronik_id = $_POST['jenis_elektronik_id']; 
$merek_id = $_POST['merek_id']; 
$count = count($layanan_id);
$countl = count($merek_id);
$count2 = count($jenis_elektronik_id);

//$layanan1= implode(',', $layanan); 
$sql = pg_query("insert into toko_reparasi (toko_id, nama_toko_repair, geom, alamat, no_telepon, foto, deskripsi, pemilik) values ('$id', '$nama', ST_GeomFromText('$geom'),'$alamat','$no_hp','$name','$deskripsi', '$pemilik')");

$sql1 ="insert into layanan_toko_reparasi (toko_id, layanan_id) values";

$sql2="insert into det_toko_produk(id_toko_produk, toko_id, merek_id, jenis_elektronik_id) values ";


$query2 = pg_query("SELECT MAX(id_toko_produk) AS id_toko_produk FROM det_toko_produk");
$result2 = pg_fetch_array($query2);
$idmax2 = $result2['id_toko_produk'];
if ($idmax2==null) 
	{
		$idmax2=1;
		for( $w=0; $w < $countl; $w++ ){
	for ($j=0; $j < $count2 ; $j++) {
	
		$sql2 .= "('{$idmax2}','{$id}','{$merek_id[$w]}','{$jenis_elektronik_id[$j]}')";
		$sql2 .= ",";
		$idmax2++;
	}
	}
	}
else{
	$idmax2++;
for( $w=0; $w < $countl; $w++ ){
	for ($j=0; $j < $count2 ; $j++) {
	
		$sql2 .= "('{$idmax2}','{$id}','{$merek_id[$w]}','{$jenis_elektronik_id[$j]}')";
		$sql2 .= ",";
		$idmax2++;

	
	}
	}
}


for( $k=0; $k < $count; $k++ ){

	
		$sql1 .= "('{$id}','{$layanan_id[$k]}')";
		$sql1 .= ",";

	}

	$sql2 = rtrim($sql2,",");
	$insert2 = pg_query($sql2);
	$sql1 = rtrim($sql1,",");
	$insert3 = pg_query($sql1);
	


if ($insert2){
	header("location:../?page=tambahhj&id=$id");
}else{
	echo 'error';
}



?>
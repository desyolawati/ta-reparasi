<?php
include ('../inc/connect.php');
$toko_id = $_POST['toko_id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];
$deskripsi = $_POST['deskripsi'];
$geom = $_POST['geom'];
$jenis_gambar=$_FILES['image']['type'];
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 600000)){
		$sourcename=$_FILES["image"]["name"];
		$name=$id.'_'.$sourcename;
		$filepath="../../foto/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
	} else if ($foto=='null' || $foto=='' || $foto==null){
		$foto='foto.jpg';
	}
/*$layanan_id = $_POST['layanan_id']; 
$jenis_elektronik_id = $_POST['jenis_elektronik_id']; 
$count = count($layanan_id);
$countl = count($jenis_elektronik_id);*/
$sql = pg_query("update toko_reparasi SET  nama_toko_repair='$nama', geom='$geom', alamat='$alamat', no_telepon='$no_telepon', 
       foto='$name', deskripsi='$deskripsi'
 WHERE toko_id='$toko_id'");

if ($sql){
	header("location:../index.php?page=listdata");
}else {
	echo 'error';
}
?>
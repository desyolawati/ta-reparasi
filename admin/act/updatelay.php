<?php
include ('../inc/connect.php');

$jenis_elektronik_id	= $_POST['layanan_id'];
$layanan = $_POST['layanan'];

$sql  = "update layanan set nama_layananan='$nama_layananan' where layanan_id=$layanan_id";
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=daflay");
}else{
	echo 'error';
}
<?php
include ('../inc/connect.php');

$jenis_elektronik_id	= $_POST['jenis_elektronik_id'];
$nama_elektronik = $_POST['nama_elektronik'];

$sql  = "update produk set nama_elektronik='$nama_elektronik' where jenis_elektronik_id=$jenis_elektronik_id";
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=dafprod");
}else{
	echo 'error';
}
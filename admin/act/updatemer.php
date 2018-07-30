<?php
include ('../inc/connect.php');

$merek_id	= $_POST['merek_id'];
$nama_merek = $_POST['nama_merek'];

$sql  = "update merek set nama_merek='$nama_merek' where merek_id=$merek_id";
$insert = pg_query($sql);

if ($insert){
	header("location:../?page=dafmer");
}else{
	echo 'error';
}
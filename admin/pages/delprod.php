<?php

$jenis_elektronik_id = $_GET['jenis_elektronik_id'];
	$sql   = "delete from produk where jenis_elektronik_id=$jenis_elektronik_id";
	$delete = pg_query($sql);
	if ($delete){
		 echo"<script>alert ('Data Berhasil Dihapus');</script>";
		 echo"<script language='JavaScript'>document.location='index.php?page=dafprod'</script>";
	}
	else{
		echo 'error';
		echo"<script language='JavaScript'>document.location='index.php?page=dafprod'</script>";
	}

?>
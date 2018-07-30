<?php

$layanan_id = $_GET['layanan_id'];
	$sql   = "delete from layanan where layanan_id=$layanan_id";
	$delete = pg_query($sql);
	if ($delete){
		 echo"<script>alert ('Data Berhasil Dihapus');</script>";
		 echo"<script language='JavaScript'>document.location='index.php?page=daflay'</script>";
	}
	else{
		echo 'error';
		echo"<script language='JavaScript'>document.location='index.php?page=daflay'</script>";
	}

?>
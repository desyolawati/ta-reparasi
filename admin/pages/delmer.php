<?php

$merek_id = $_GET['merek_id'];
	$sql   = "delete from merek where merek_id=$merek_id";
	$delete = pg_query($sql);
	if ($delete){
		 echo"<script>alert ('Data Berhasil Dihapus');</script>";
		 echo"<script language='JavaScript'>document.location='index.php?page=dafmer'</script>";
	}
	else{
		echo"<script>alert ('Data Gagal Dihapus');</script>";
		echo"<script language='JavaScript'>document.location='index.php?page=dafmer'</script>";
	}

?>
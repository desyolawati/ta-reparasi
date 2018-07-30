<?PHP 

	$toko_id=$_GET["toko_id"];
	//$id_toko_produk=$_GET["id_toko_produk"];
	$sql1="DELETE from det_toko_produk where toko_id=$toko_id";
	$sql3="DELETE FROM jam_kerja where  gid=$toko_id";
	$sql4="DELETE FROM rating where gid=$toko_id";
	$sql6="DELETE from layanan_toko_reparasi where toko_id=$toko_id";
	$sql5="DELETE from toko_reparasi where toko_id=$toko_id";

	if(pg_query($sql1)){
			echo"<script>alert ('Data Berhasil Dihapus');</script>";
			  echo"<script language='JavaScript'>document.location='index.php?page=listdata'</script>";
			
		}else
		{
			echo"<script>alert ('Data Gagal Dihapus');</script>";
			  echo"<script language='JavaScript'>document.location='index.php?page=listdata'</script>";
		}

	if(pg_query($sql3)){
			echo"<script>alert ('Data Berhasil Dihapus');</script>";
			  echo"<script language='JavaScript'>document.location='index.php?page=listdata'</script>";
			
		}else
		{
			echo"<script>alert ('Data Gagal Dihapus');</script>";
			  echo"<script language='JavaScript'>document.location='index.php?page=listdata'</script>";
		}
	if(pg_query($sql4)){
			echo"<script>alert ('Data Berhasil Dihapus');</script>";
			  echo"<script language='JavaScript'>document.location='index.php?page=listdata'</script>";
			
		}else
		{
			echo"<script>alert ('Data Gagal Dihapus');</script>";
			  echo"<script language='JavaScript'>document.location='index.php?page=listdata'</script>";
		}
	
	if(pg_query($sql6)){
			echo"<script>alert ('Data Berhasil Dihapus');</script>";
			  echo"<script language='JavaScript'>document.location='index.php?page=listdata'</script>";
			
		}else
		{
			echo"<script>alert ('Data Gagal Dihapus');</script>";
			  echo"<script language='JavaScript'>document.location='index.php?page=listdata'</script>";
		}

	if(pg_query($sql5)){
			echo"<script>alert ('Data Berhasil Dihapus');</script>";
			  echo"<script language='JavaScript'>document.location='index.php?page=listdata'</script>";
			
		}else
		{
			echo"<script>alert ('Data Gagal Dihapus');</script>";
			  echo"<script language='JavaScript'>document.location='index.php?page=listdata'</script>";
		}

?>

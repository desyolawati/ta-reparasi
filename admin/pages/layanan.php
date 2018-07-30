<?php
include ('connect.php');
$id=$_GET["id"];
$dataarray=array();
 
$sql=pg_query("SELECT layanan_id, nama_layananan
  FROM layanan
");
			
while($row = pg_fetch_array($sql)){
	$layanan_id=$row['layanan_id'];
	$nama_layananan=$row['nama_layananan'];
	$dataarray[]=array('layanan_id'=>$layanan_id,'nama_layananan'=>$nama_layananan);
}
echo json_encode ($dataarray);
   			  
?>
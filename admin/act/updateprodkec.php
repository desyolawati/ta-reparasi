<?php
include ('../inc/connect.php');
$toko_id = $_POST['toko_id'];
$id_toko_produk = $_POST['id_toko_produk'];

$countl = count($id_toko_produk);
echo "$countl";
/*$sqll   = "INSERT INTO det_toko_produk (id_toko_produk, jenis_elektronik_id) VALUES ('$id_toko_produk')";
for( $i=0;$i<$countl;$i++){
	$data = explode((','), $jenis_elektronik_id[$i]);
	if(!array_search($data[0], $array_data)){
		$sqll .= "('$data[0]','$data[1]')";
		$sqll .= ",";
	}
}
$sqll = rtrim($sqll,",");
$insert = pg_query($sqll);

if ($insert ){
	echo "<script>
		alert (' Data Successfully Change');
		</script>";
	header("location:../index1.php?page=formprod");
}
else{
	echo 'error';
}*/

?>
<?php 
include ('../inc/connect.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$pass = $_POST['password'];
$role = $_POST['role'];
$password = md5(md5($pass));
$cekuser = pg_query("SELECT * FROM login WHERE username = '$nama'");
if(pg_num_rows($cekuser) <> 0) {
echo "Username Sudah Terdaftar!";
?><script language="JavaScript">document.location='../register.php'</script><?php
} else {
if(!$nama || !$password) {
echo "Masih ada data yang kosong!";
?><script language="JavaScript">document.location='../register.php'</script><?php
} 
else {
$simpan = pg_query("INSERT INTO login(id, username, password, role) VALUES('$id','$nama','$password','$role')");
if($simpan) {
?><script language="JavaScript">document.location='../login.php'</script><?php
} else {
echo "Proses Gagal!";
}
}
}
?>
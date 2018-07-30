<?php
include ('../inc/connect.php');
session_start();
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	//$nama_pengurus = $_POST['nama_pengurus'];
	$pass = md5(md5($password));
	//$pass=$password;
	$sql = pg_query("SELECT * FROM login WHERE upper(username)=upper('$username') and password='$pass'");
	$num = pg_num_rows($sql);
	$dt = pg_fetch_array($sql);
	if($num==1){
		
		$_SESSION['username'] = $username;
		

		if($dt['role']=='1'){
			$_SESSION['admin'] = true;
			$_SESSION['username']=$dt['username'];
			$_SESSION['id']=$dt['id'];
			$_SESSION['toko_id']=$dt['toko_id'];
			$query=pg_query("select * from toko_reparasi where id='$dt[toko_id]'");
			$data=pg_fetch_assoc($query);
			$_SESSION['toko_id']=$data['toko_id'];
			?><script language="JavaScript">document.location='../'</script><?php
		}
		
		if($dt['role']=='2'){
			$_SESSION['admin'] = true;
			?><script language="JavaScript">document.location='../index1.php'</script><?php
		}
		//$result = pg_query("update login set last_login = now() where username='$username'");
		
	}else{
		echo "<script>
		alert (' Maaf Login Gagal, Silahkan Isi Username dan Password Anda Dengan Benar');
		eval(\"parent.location='../login.php '\");	
		</script>";
	}
}
?>
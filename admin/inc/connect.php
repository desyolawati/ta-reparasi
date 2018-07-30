<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "postgres";
	$port = "5432";
	$dbname = "reparasi_2";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
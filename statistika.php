<?php
// skrip koneksi database
require 'connect.php';

$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
$waktu   = time(); //
 
// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
$s = pg_query("SELECT * FROM tstatistika WHERE ip='$ip' AND tanggal='$tanggal'");

// Kalau belum ada, simpan data user tersebut ke database
if(pg_num_rows($s) == 0){
    pg_query("INSERT INTO tstatistika(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
}
// Jika sudah ada, update
else{
    pg_query("UPDATE tstatistika SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
}

$pengunjung       = pg_num_rows(pg_query("SELECT * FROM tstatistika WHERE tanggal='$tanggal' GROUP BY ip, tanggal, hits, online")); // Hitung jumlah pengunjung
$totalpengunjung  = pg_result(pg_query("SELECT COUNT(hits) FROM tstatistika"), 0); // hitung total pengunjung
$bataswaktu       = time() - 300;
$pengunjungonline = pg_num_rows(pg_query("SELECT * FROM tstatistika WHERE online > '$bataswaktu'")); // hitung pengunjung online
?> 


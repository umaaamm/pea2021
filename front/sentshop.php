<?php
include 'inc/header.php'; 
include 'inc/secretkey.php';
include 'inc/db_con.php';


$q=$_POST['q'];
if ($q!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
} 

$nama = $_POST['nama'];
$hp = $_POST['hp'];
$paket = $_POST['paket'];


// perintah SQL
$query="INSERT INTO tb_pevita_shop VALUES (null, '$nama','$hp','$paket',now())";

$hasil=mysql_query($query);

if ($hasil){
	echo "<center> <b> <font color = 'green' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font>";
	
} else { 
	echo "<center> <b> <font color = 'red' size = '4'> <p> Data Gagal disimpan </p> </center> </b> </font>";
}

echo "<br><br><a href='index.php?q=" . KEY::SECRET_KEY . "'>Kembali ke Home</a>";
include 'inc/footer.php'; 
?>
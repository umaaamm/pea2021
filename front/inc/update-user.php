<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    
<title>SELENA 1.0</title>
    
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link rel="stylesheet" type="text/css" href="../styles/framework.css">
<link rel="stylesheet" type="text/css" href="../styles/custom.css">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>
<?php 
include 'ceksession.php';
include 'header.php'; 
include 'secretkey.php';
include 'db_con.php';
include 'library.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}

echo '<body>';
echo '<div id="page-transitions">';

echo '<div id="page-content" class="page-content">  ';

echo '<div id="page-content-scroll" class="header-clear-larger">';
echo '<div class="content">';
echo '<div class="container no-bottom">';
echo '<div class="contact-form no-bottom">';


$katasandilama 	= secureinput($_REQUEST['katasandilama']);
$katasandibaru 	= secureinput($_REQUEST['katasandibaru']);
$ulangkatasandi	= secureinput($_REQUEST['ulangkatasandi']);


$kode_kanwil	= dekripsi($_SESSION['kode_unit_kerja']);
$nik			= dekripsi($_SESSION['username']);
$nama 			= dekripsi($_SESSION['nama']);

$result			= mysql_query("SELECT * FROM tb_pevita_user where nik_pegawai='$nik'");
$row			= mysql_fetch_array($result);
$pass 			= $row[2];

if ($katasandilama==$pass) {
	if ($katasandibaru==$ulangkatasandi) {
		$query="UPDATE tb_pevita_user SET password='$katasandibaru' WHERE nik_pegawai='$nik'";
		$hasil=mysql_query($query);
			if ($hasil) {
				echo '<center><h4>KATA SANDI BERHASIL DIUBAH</h4></center>';
				echo '<a href="../update-user.php?q='.$key.'" class="button-full button button-green uppercase ultrabold">KEMBALI</a>';
			} else {
				echo '<center><h4>ERROR!' . mysqli_error($connect) .' </h4></center>';
				echo '<a href="javascript:history.go(-1)" class="button-full button button-red uppercase ultrabold">KEMBALI</a>';
			}
			
	} else {
		echo '<center><h4>KONFIRMASI KATA SANDI BARU TIDAK SAMA!' . mysqli_error($connect) .' </h4></center>';
		echo '<a href="javascript:history.go(-1)" class="button-full button button-red uppercase ultrabold">KEMBALI</a>';
	}
}else{
	echo '<center><h4>KATA SANDI LAMA TIDAK BENAR!' . mysqli_error($connect) .' </h4></center>';
	echo '<a href="javascript:history.go(-1)" class="button-full button button-red uppercase ultrabold">KEMBALI</a>';
}

?>
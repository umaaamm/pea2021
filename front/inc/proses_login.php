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
include 'koneksi.php';
include 'constant.php';
include 'library.php';
include 'secretkey.php';
//$username   = $_POST['username'];
//$password   = $_POST['password'];

echo '<body>';
echo '<div id="page-transitions">';

echo '<div id="page-content" class="page-content">  ';

echo '<div id="page-content-scroll" class="header-clear-larger">';
echo '<div class="content">';
echo '<div class="container no-bottom">';
echo '<div class="contact-form no-bottom">';

if (isset($_POST['key'])) {
	$key = dekripsi($_POST['key']);
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

if (isset($_POST['sandi'])) {
    $sandi = $_POST['sandi'];
}

if ($key==APP_CONST::APP_KEY) {
	$tahun   	= substr($password,0,4);
	$bulan  	= substr($password,4,2);
	$tanggal	= substr($password,6,2);
	$passwd 	= $tahun.'-'.$bulan.'-'.$tanggal;

	$cek      = mysqli_query($connect, "SELECT nik_pegawai, nama_pegawai, password, is_admin, event_kanwil, nm_kantor, nama_cabang, jabatan
										FROM tb_pevita_user where nik_pegawai='$username' AND tgl_lahir='$passwd' AND password='$sandi'");
	$result   = mysqli_num_rows($cek);
	if($result>0){
	    $user = mysqli_fetch_array($cek);
	    session_start();
	    //$_SESSION['username'] = $user['username'];
	    //header("location:../blog.php");
	    //$_SESSION['level']          = enkripsi($user['is_admin']);
	    $_SESSION['username']       = enkripsi($user['nik_pegawai']);
	    //$_SESSION['kode_outlet']    = enkripsi($user['kode_outlet']);
	    //$_SESSION['kode_area']      = enkripsi($user['kode_area']);
	    //$_SESSION['nama_area']      = enkripsi($user['nama_area']);
	    //$_SESSION['kode_kanwil']    = enkripsi($user['kode_induk']);
	    //$_SESSION['nama_kanwil']    = enkripsi($user['nama_wilayah']);
	    $_SESSION['is_admin']       = enkripsi($user['is_admin']);
		$_SESSION['nama']			= enkripsi($user['nama_pegawai']);
		$_SESSION['kode_unit_kerja'] = enkripsi($user['event_kanwil']);
		$_SESSION['nm_kanwil'] = enkripsi($user['nm_kantor']);
		$_SESSION['nm_cabang'] = enkripsi($user['nama_cabang']);
		$_SESSION['jabatan'] = enkripsi($user['jabatan']);
	    //echo "$user";
	    echo '<script language="javascript">document.location="../pilihevent.php?q='. KEY::SECRET_KEY .'";</script>';
	}else{
	    $err = mysqli_error($connect);
	    echo '<center><h4>USER ID/ PASSWORD SALAH</h4></center>';
	    echo '<center><p>Atau periksa kembali data yang diinput!</p></center>';
	    echo '<center><p>Error : ' . $err . '</p></center>';
	    echo '<a href="javascript:history.go(-1)" class="button-full button button-red uppercase ultrabold">Kembali</a>';
	}
} else {
	echo '<center><h4>SYSTEM ERROR</h4></center>';
	echo '<center><p>You\'re not supposed to be here!</p></center>';
	echo '<center><p>Go Away!</p></center>';
	echo '<center><p>Key : ' . $key . '</p></center>';

	echo '<a href="javascript:history.go(-1)" class="button-full button button-red uppercase ultrabold">Kembali</a>';
}
?>
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/custom.js"></script>
<script type="text/javascript" src="../scripts/plugins.js"></script>

</body>
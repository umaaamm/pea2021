<?php
include("koneksi.php");
$username=$_POST['username'];
$password=$_POST['password'];
$qry=mysqli_query($koneksi,"select * from tb_pevita_user where nik_pegawai='$username' and password='$password'") or die(mysqli_error());

$banyak=mysqli_num_rows($qry);
$output = array();
if($banyak >= 1){
	while($data=mysqli_fetch_object($qry)){
		$output[]=$data;
	}
	$output['pesan']="Selamat Datang di PEA 2021 :)";
}
else{
	$output['error']=true;
	$output['pesan']="Login Gagal, Ulangi Proses Login :(";
}
echo json_encode($output,JSON_PRETTY_PRINT);
<?php
include("koneksi.php");
$username=$_POST['username'];
$password=$_POST['password'];

$qry=mysqli_query($koneksi,"update tb_pevita_user set password = '$password' where nik_pegawai = '$username'");

if ($qry == false) {
	$output['error']=true;
	$output['pesan']="Gagal Update Password";
} else {
	$output['pesan']="Berhasil Update Password";
}

echo json_encode($output,JSON_PRETTY_PRINT);
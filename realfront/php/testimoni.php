<?php
include("koneksi.php");
$nik_pegawai		= $_POST['nik_pegawai'];
$nama_pegawai	= $_POST['nama_pegawai'];
$pesan			= $_POST['pesan'];
$foto = $_POST['foto'];
$status = 0;

$qry=mysqli_query($koneksi,"INSERT INTO `tb_testimoni_pea` (`nik_pegawai`, `nama_pegawai`, `pesan`, `status_approve`, `foto`) VALUES ('$nik_pegawai', '$nama_pegawai', '$pesan', '$status', '$foto')");

if ($qry == false) {
	$output['error']=true;
	$output['pesan']="Gagal Menyimpan Testimoni Anda";
} else {
	$output['pesan']="Berhasil Menyimpan Testimoni Anda";
}

echo json_encode($output,JSON_PRETTY_PRINT);
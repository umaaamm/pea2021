<?php
include("koneksi.php");
$keterangan_barang		= $_POST['keterangan_barang'];
$list_petugas_tracking	= $_POST['list_petugas_tracking'];
$fourRandomDigit 		= mt_rand(1000,9999);
$no_bagasi				= "BG-".$fourRandomDigit;
$nik_pegawai			= $_POST['nik_pegawai'];

$qry=mysqli_query($koneksi,"INSERT INTO `tb_tracking` (`nik_pegawai`, `no_bagasi`, `keterangan`, `id_kontak`, `status`) VALUES ('$nik_pegawai', '$no_bagasi', '$keterangan_barang', '$list_petugas_tracking', '1')");

if ($qry == false) {
	$output['error']=true;
	$output['pesan']="Gagal Register Barang";
} else {
	$output['pesan']="Berhasil Register Barang";
}

echo json_encode($output,JSON_PRETTY_PRINT);
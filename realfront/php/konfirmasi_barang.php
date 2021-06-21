<?php
include("koneksi.php");
$id_tracking=$_POST['id_tracking'];

$qry=mysqli_query($koneksi,"UPDATE `tb_tracking` SET `status` = '5' WHERE `tb_tracking`.`id_tracking` = '$id_tracking';");

if ($qry == false) {
	$output['error']=true;
	$output['pesan']="Gagal Update Barang";
} else {
	$output['pesan']="Barang Diterima";
}

echo json_encode($output,JSON_PRETTY_PRINT);
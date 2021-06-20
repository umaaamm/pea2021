<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Credentials:true");
	header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS");
	header("Access-Control-Max-Age:604800");
	header("Access-Control-Request-Headers: x-requested-with");
	header("Access-Control-Allow-Headers: x-requested-with, x-requested-by");
	include("koneksi.php");
	$data = array();
	$id_tracking = $_GET['id_tracking'];
	$cari = mysqli_query($koneksi, "SELECT * FROM tb_tracking a join tb_val_tracking b on a.status=b.id_val join tb_kontak c on a.id_kontak=c.id_kontak where a.id_tracking = '$id_tracking'");
    while ($row = mysqli_fetch_object($cari)) {
	    $sql[] = $row;
	}
	$data['data']		= $sql;
	echo json_encode($data);
    ?>
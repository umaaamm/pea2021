<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Credentials:true");
	header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS");
	header("Access-Control-Max-Age:604800");
	header("Access-Control-Request-Headers: x-requested-with");
	header("Access-Control-Allow-Headers: x-requested-with, x-requested-by");
	include("koneksi.php");
	$data = array();
	$cari = mysqli_query($koneksi, "SELECT * FROM tb_testimoni_pea where status_approve='1' ORDER BY id_testimoni DESC ");
    while ($row = mysqli_fetch_object($cari)) {
	    $sql[] = $row;
	}
	$data['data']		= $sql;
	echo json_encode($data);
    ?>
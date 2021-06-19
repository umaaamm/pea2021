<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Credentials:true");
	header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS");
	header("Access-Control-Max-Age:604800");
	header("Access-Control-Request-Headers: x-requested-with");
	header("Access-Control-Allow-Headers: x-requested-with, x-requested-by");
	include("koneksi.php");
	$data = array();
	$cari = mysqli_query($koneksi, "SELECT * FROM tb_rundown_pea where id_event_pea='".$_GET['id']."' ");
    while ($row = mysqli_fetch_object($cari)) {
	    $sql[] = $row;
	}
	$data['data']		= $sql;
	echo json_encode($data);
    ?>
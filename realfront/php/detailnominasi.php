<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Credentials:true");
	header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS");
	header("Access-Control-Max-Age:604800");
	header("Access-Control-Request-Headers: x-requested-with");
	header("Access-Control-Allow-Headers: x-requested-with, x-requested-by");
	include("koneksi.php");
	$data = array();
	$cari = mysqli_query($koneksi, "SELECT * FROM tb_pevita_user INNER JOIN tb_nominasi on tb_pevita_user.id_nominasi = tb_nominasi.id_nominasi where tb_pevita_user.id_nominasi='".$_GET['id']."' ");
    while ($row = mysqli_fetch_object($cari)) {
	    $sql[] = $row;
	}
	$data['data']		= $sql;
	echo json_encode($data);
    ?>
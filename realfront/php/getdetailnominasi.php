<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Credentials:true");
	header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS");
	header("Access-Control-Max-Age:604800");
	header("Access-Control-Request-Headers: x-requested-with");
	header("Access-Control-Allow-Headers: x-requested-with, x-requested-by");
	include("koneksi.php");
	$data = array();
    $data_nominator = mysqli_query($koneksi, "SELECT * FROM tb_pevita_user join tb_nominasi on tb_pevita_user.id_nominasi = tb_nominasi.id_nominasi where nik_pegawai='".$_GET['nik']."' ");
    while ($row1 = mysqli_fetch_object($data_nominator)) {
	    $sql_detail[] = $row1;
	}

    $random = rand(1,1);
	$cari = mysqli_query($koneksi, "SELECT * FROM tb_pevita_user INNER JOIN tb_nominasi on tb_pevita_user.id_nominasi = tb_nominasi.id_nominasi where tb_pevita_user.id_nominasi='$random'");
    while ($row = mysqli_fetch_object($cari)) {
	    $sql[] = $row;
	}
	$data['data']		        = $sql;
    $data['data_detail']		= $sql_detail;
	echo json_encode($data);
    ?>
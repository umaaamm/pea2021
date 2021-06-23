<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Credentials:true");
	header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS");
	header("Access-Control-Max-Age:604800");
	header("Access-Control-Request-Headers: x-requested-with");
	header("Access-Control-Allow-Headers: x-requested-with, x-requested-by");
	include("koneksi.php");
	$qry=mysqli_query($koneksi ,"SELECT * FROM tb_testimoni_pea where nik_pegawai='".$_GET['nik_pegawai']."' ") or die(mysqli_error());
	$banyak=mysqli_num_rows($qry);
	$output = array();
	if($banyak >= 1){
		$output['hasil']=true;
	}	
	else{
		$output['error']=true;
	}
	echo json_encode($output,JSON_PRETTY_PRINT);

    ?>
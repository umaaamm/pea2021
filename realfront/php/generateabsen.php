<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Credentials:true");
	header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS");
	header("Access-Control-Max-Age:604800");
	header("Access-Control-Request-Headers: x-requested-with");
	header("Access-Control-Allow-Headers: x-requested-with, x-requested-by");
	include("koneksi.php");

	$data = array();
	$nik = $_GET['nik'];

	// $cari = mysqli_query($koneksi, "SELECT * FROM tb_pevita_user where nik_pegawai='$nik'");
	$cari = mysqli_query($koneksi, "select * from tb_pevita_user a join tb_nominasi b on a.id_nominasi=b.id_nominasi where nik_pegawai='$nik'");

	while ($row = mysqli_fetch_object($cari)) {
	    $sql[] = $row;
	}

	$nik_pegawai        = $sql[0]->nik_pegawai;
	$nama               = $sql[0]->nama_pegawai;
	$id_event_pea 		= $_GET['id'];
	$jabatan           	= $sql[0]->jabatan;
	$no_hp              = $sql[0]->hp;
	$no_kursi           = $sql[0]->no_kursi;
	$unit_kerja        	= $sql[0]->unit;

	if ($id_event_pea == '10') {
		$nama_event        	= 'Grand Final Group 1';
	}
	else if ($id_event_pea == '11') {
		$nama_event        	= 'Grand Final Group 2';
	}
	else if ($id_event_pea == '12') {
		$nama_event        	= 'Grand Final Group 3';
	}
	else if ($id_event_pea == '13') {
		$nama_event        	= 'Grand Final Group 4';
	}
	else if ($id_event_pea == '20') {
		$nama_event        	= 'PEA 2021';
	}
	else if ($id_event_pea == '30') {
		$nama_event        	= 'Bali City Tour';
	}

	$size               = "285x285";
	$encoding           = "UTF-8";
	$correction         = "L";
	$content            = enkripsi($nik_pegawai.'|'.$nama.'|'.$id_event_pea.'|'.$jabatan.'|'.$no_hp.'|'.$no_kursi.'|'.$unit_kerja.'|'.$nama_event);
	                         

	$data['rootUrl'] 		= "https://chart.googleapis.com/chart?cht=qr&chs=$size&chl=". $content . "&choe=$encoding&chld=$correction";
	$data['nama']			= $nama;
	$data['no_kursi']		= $no_kursi;
	$data['nominasi_nama']	= $sql[0]->nama_nominasi;
	$data['nama_event']		= $nama_event;

	echo json_encode($data);


    function enkripsi( $string) {
        $secret_key = 'P3g4Da!Anm47u';
        $secret_iv  = 'Ad3eR!5w4n';
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        return $output;
    }
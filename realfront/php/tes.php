<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Credentials:true");
	header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS");
	header("Access-Control-Max-Age:604800");
	header("Access-Control-Request-Headers: x-requested-with");
	header("Access-Control-Allow-Headers: x-requested-with, x-requested-by");
	include("koneksi.php");

	$data = array();
	$nik = 'P00002';
	$cari = mysqli_query($koneksi, "SELECT * FROM tb_pevita_user where nik_pegawai='$nik'");
	while ($row = mysqli_fetch_object($cari)) {
	    $sql[] = $row;
	}

	$nik_pegawai        = $sql[0]->nik_pegawai;
	$nama               = $sql[0]->nama_pegawai;
	$id_event_pea       = '01';
	$jabatan            = 'PNT4';
	$no_hp              = $sql[0]->hp;
	$no_kursi           = '14A';
	$unit_kerja         = 'PASTI';
	$nama_event         = 'PEA2021';

	$size               = "285x285";
	$encoding           = "UTF-8";
	$correction         = "L";
	$content            = enkripsi($nik_pegawai.'|'.$nama.'|'.$id_event_pea.'|'.$jabatan.'|'.$no_hp.'|'.$no_kursi.'|'.$unit_kerja.'|'.$nama_event);
	                         

	$data['rootUrl'] 	= "https://chart.googleapis.com/chart?cht=qr&chs=$size&chl=". $content . "&choe=$encoding&chld=$correction";
	$data['nama']		= $nama;
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
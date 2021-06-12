<?php 
include 'inc/db_con.php';
include 'inc/ceksession.php';
include 'inc/header.php'; 
include 'inc/secretkey.php';
include 'inc/library.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}


$id = secureinput($_REQUEST['id']);
$pertanyaan = secureinput($_POST['tanya']);
$sesi = secureinput($_POST['sesi']);

$kode_kanwil	= dekripsi($_SESSION['kode_unit_kerja']);
$nik	= dekripsi($_SESSION['username']);
$nama = dekripsi($_SESSION['nama']);
//echo "nama: $nama <br>"; 
//echo "Pertanyaan :$pertanyaan <br>";
//echo "sesi: $sesi <br>";
//echo "sesi: $kode_kanwil <br>";
//echo "sesi: $nik <br>";
//exit();
// perintah SQL
//$query="INSERT INTO tb_pevita_qa VALUES (null, '$nama','$pertanyaan','$sesi', now(),'$display')";

echo '<body>';
		echo '<div id="page-transitions">';
		//include '../common/sidebarmenu.php';
		echo '<div id="page-content" class="page-content">	';
		//include '../common/headermenu.php';
		echo '<div id="page-content-scroll" class="header-clear-larger">';
		echo '<div class="content">';
		echo '<div class="container no-bottom">';
		echo '<div class="contact-form no-bottom">';

$query="INSERT INTO tb_pevita_qa VALUES (null, '$nik', '$nama','$pertanyaan','$sesi', '$kode_kanwil', '$id', now())";

$hasil=mysqli_query($koneksi, $query);

if ($hasil){
	echo '<center><h4 style="margin-bottom: 40px;">KIRIM PERTANYAAN BERHASIL</h4></center>';
		echo '<a href= "detail_pertanyaan.php?q='.$key.'&id='.$id.'&sesi='.$sesi.'" class="button-full button button-green uppercase ultrabold">LIHAT PERTANYAAN TERKIRIM</a>';
	
} else { 
	//echo '<center><h4>KIRIM PERTANYAAN GAGAL' . mysqli_error($koneksi) .' </h4></center>';
	echo '<a href="javascript:history.go(-1)" class="button-full button button-red uppercase ultrabold">Kembali</a>';
}


include 'inc/footer.php'; 
?>
<?php 
include 'inc/ceksession.php';
include 'inc/header.php'; 
include 'inc/secretkey.php';
include 'inc/db_con.php';
include 'inc/library.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}
	$nik	= dekripsi($_SESSION['username']);
	$id = $_REQUEST['id'];
	$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
?>	


<?php 
	
	
		echo '<body>';
		echo '<div id="page-transitions">';
		//include '../common/sidebarmenu.php';
		echo '<div id="page-content" class="page-content">	';
		//include '../common/headermenu.php';
		echo '<div id="page-content-scroll" class="header-clear-larger">';
		echo '<div class="content">';
		echo '<div class="container no-bottom">';
		echo '<div class="contact-form no-bottom">';
		$norek 		= secureinput($_POST['norek']);
		$gte 		= secureinput($_POST['gte']);
		$hp 		= secureinput($_POST['hp']);	 

		if ($gte=='') {
			$gte = '00000';
		}
		if ($norek=='') {
			$norek = '00000';
		}
		
		$perintah="INSERT INTO townhall SET norektabungan='$norek', hp='$hp', gte_id='$gte', event_id='$id', event_kanwil='$kode_unit_kerja', nik='$nik'";
		mysql_query($perintah) or die(addslashes($perintah));
		
		if ($perintah) {
		echo '<center><h4>SIMPAN DATA BERHASIL</h4></center>';
		echo '<a href= "menu.php?q='.$key.'&id='.$id.'" class="button-full button button-green uppercase ultrabold">Lanjut Ke Menu Utama</a>';
	} else {
		echo '<center><h4>SIMPAN Data Gagal ' . mysqli_error($connect) .' </h4></center>';
		echo '<a href="javascript:history.go(-1)" class="button-full button button-red uppercase ultrabold">Kembali</a>';
		
	}
	//	header("Location: https://launcher.pegadaian.co.id/pevita/front/formtownhall.php?q='.$key.'&id='.$id.'");
								
									
							   // [4] End custom code
							   // [5] Enkripsi semua variabel
							  
							

?>
<?php include 'inc/footer.php'; ?>	
<?php 
include 'inc/db_con.php';
include 'inc/ceksession.php';
//include 'inc/header.php'; 
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
			$result=mysqli_query($koneksi, "SELECT * FROM tb_pevita_user where event_kanwil = '$kode_unit_kerja' AND nik_pegawai = '$nik' AND hp ='0' ");
			if(mysqli_num_rows($result) > 0) {
				while ($row= mysqli_fetch_array($result)){
					echo '<script language="javascript">document.location="../front/formtownhall.php?q='.$key.'&id='.$id.'";</script>';		
				}
							
			} 
			else {
				echo '<script language="javascript">document.location="../front/menu.php?q='.$key.'&id='.$id.'";</script>';
				}
	
	

							  
							

?>
	
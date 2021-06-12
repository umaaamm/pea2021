<?php 
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
	if ($id=='21' || $id=='23' || $id=='24' || $id=='26' || $id=='27' || $id=='28' || $id=='29' || $id=='30' || $id=='31' || $id=='32'
		|| $id=='33' || $id=='34' || $id=='35' || $id=='36' || $id=='37' || $id=='38' || $id=='39' || $id=='40' || $id=='41' || $id=='42' 
		|| $id=='43' || $id=='44' || $id=='45' || $id=='46' || $id=='48'|| $id=='49') {
		$result=mysql_query("SELECT * FROM townhall where event_kanwil = '$kode_unit_kerja' AND nik = '$nik' AND event_id='$id' ");
			if(mysql_num_rows($result) > 0) {
				while ($row= mysql_fetch_array($result)){
					echo '<script language="javascript">document.location="../front/menu.php?q='.$key.'&id='.$id.'";</script>';
				}
							
			} 
			else {
					echo '<script language="javascript">document.location="../front/formtownhall.php?q='.$key.'&id='.$id.'";</script>';		
				}
	} else {
		echo '<script language="javascript">document.location="../front/menu.php?q='.$key.'&id='.$id.'";</script>';
	}
	
	

							  
							

?>
	
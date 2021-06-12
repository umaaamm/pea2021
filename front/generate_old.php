<?php 
include 'inc/ceksession.php';
include 'inc/header.php'; 
include 'inc/secretkey.php';
include 'inc/library.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}
$id = $_REQUEST['id'];
//2
						//$size          = $_REQUEST['size'];
						//$content       = $_REQUEST['content'];
						//$correction    = strtoupper($_REQUEST['correction']);
						//$encoding      = $_REQUEST['encoding'];
						$size          		= "285x285";
						//$content       		= "P92449";
						$correction    		= "L";
						$encoding      		= "UTF-8";
						$nama				= dekripsi($_SESSION['nama']);
						$nik				= dekripsi($_SESSION['username']);
						//$namakanwil			= dekripsi ($_SESSION['nm_kanwil']);
						//$id 				= $_REQUEST['id'];
						//$jadwal 			= $_REQUEST['id_jadwal' ];
						//$nama_acara 		= $_REQUEST['nama_acara'];
						//$oke			=	"082120987392";
						//$norek          = "1234567891234567";
						
						//3
						//echo "nama : $id";
					//	echo "nik : $nik";
		//				echo "jadwal : $nama_acara";
//exit();
						//4
?>	
<style>
 p {
	 margin-bottom: 3px !important;
	 line-height: 15px !important;
 }
 
 h5 {
	 margin-top:2px !important;
	 line-height: 15px !important;
 }
</style>
<div id="page-transitions">
		<?php 
		include 'inc/sidebarmenu.php';
		
		?>				
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content">
		<?php
			include 'inc/headermenu.php';
		?>		
		<div id="page-content-scroll"><!--Enables this element to be scrolled -->
		
			<div class="article-card article-full full-bottom">
				<div class="article-header">
					<span class="article-overlay"></span>
					<span class="article-image preload-image" data-src-retina="images/pictures/materi.png" data-src="images/pictures/materi.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">QR Code Presensi</span>
					<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Transformasi </span>
				</div>
			</div>
			
			<div class="content">
				<p class="half-bottom">
					Silahkan scan QR code ini ke QR code reader yang tersedia di meja panitia.
				</p>
			</div>
			
			<div class="content" style="align-content: center;">
				<div class="decoration no-bottom">
				</div>
				<ul class="link-list">
					<?php
						//$dekrip_jadwal 		= enkripsi($jadwal);
						//$dekrip_acara 		= enkripsi($nama_acara);
						$dekrip_nama_acara		= $nama_acara;
						
						include 'inc/db_con.php'; 
						$result=mysql_query("SELECT * FROM townhall where nik='$nik' and event_id='$id'");
						//$result=mysql_query('SELECT * FROM tb_pevita_peserta');
						
						while ($row=mysql_fetch_array($result)){
							
							$norek = $row["norektabungan"];
							$hp = $row["hp"];
							$gte_id = $row["gte_id"];
							
						}
						
						$content       		= enkripsi($nik.'|'.$nama.'|'.$hp.'|'.$norek.'|'.$gte_id);
						//$content       		= $nik.'|'.$nama.'|'.$norek.'|'.$hp.'|'.$gte_id;
						


						$rootUrl = "https://chart.googleapis.com/chart?cht=qr&chs=$size&chl=". $content . "&choe=$encoding&chld=$correction";				
						echo "<li><h3 style='text-align:center;'>$nama_acara</h3></li>";
						echo '<img style="margin-left:20px;" src="'.$rootUrl.'">';
						echo "<li style='padding-top:0px !important'>
							  </li>";
						
					?>
					
				</ul>
				<br>
<br>
			</div>	
			
		</div>
<?php include 'inc/footermenu.php' ?>		
	</div>
</div>
	
<?php include 'inc/footer.php'; ?>	
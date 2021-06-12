<?php
//include 'inc/header.php'; 
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

$sesi = $_REQUEST['sesi'];

$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
	$id = $_REQUEST['id'];
$nik = dekripsi($_SESSION['username'] );
$nm_kantor =	dekripsi($_SESSION['nm_kanwil']);
?>	

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<title>Pegadaian Event App.</title>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/custom.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>

<body>
<div id="page-transitions">
	<?php 
		include 'inc/sidebarmenu.php';
		
	?>			
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content">
		<?php
			include 'inc/headermenu.php';
		?>		
		<div id="page-content-scroll"> <!--Enables this element to be scrolled -->
					<div class="article-card article-full full-bottom">
				<div class="article-header">
					<span class="article-overlay"></span>
					<span class="article-image preload-image" data-src-retina="images/pictures/pertanyaan.png" data-src="images/pictures/pertanyaan.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Daftar Pertanyaan Anda</span>
					<?php 
							$result=mysqli_query($koneksi, "SELECT * FROM pevita_event where event_id='$id'");
							$row=mysqli_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
					<!--<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Tranformasi</span>-->
					<!--<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i>Townhall Tranformasi <?php echo $nm_kantor; ?></span>-->
					<span class="article-author color-gray-light"></span>
				</div>
			</div>
			<div class="content reading-time-box reading-words">
				<div class="content">
					<div class="container no-bottom">
						<div class="contact-form no-bottom">		
						</div>
						<div class="content">
							
							<?php
							// perintah SQL
								$result=mysqli_query($koneksi, "SELECT tb_pevita_qa.*, tb_pevita_user.unit FROM tb_pevita_qa, tb_pevita_user
											WHERE tb_pevita_qa.nik=tb_pevita_user.nik_pegawai AND tb_pevita_qa.event_id='$id' AND tb_pevita_qa.event_kanwil='$kode_unit_kerja' AND tb_pevita_qa.nik='$nik' AND tb_pevita_qa.sesi='$sesi'");
								//$result=mysql_query("SELECT * FROM tb_pevita_qa WHERE sesi='$sesi'");
								if(mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_array($result)) { 
									
										echo "<div class='news-list-item2'>";
										echo "<a href='#'>";
										echo "<strong>$row[2] ($row[1] - $row[8])</strong> bertanya:";
										echo "</a>";
										echo "<span><i class='fa fa-question-circle'></i>&nbsp;&nbsp;$row[3]</span>";
										echo "</div>";
									
										}
									} else {
									  
									  echo "<strong>Anda belum mengisi pertanyaan pada sesi ini.</strong>";
									  echo "&nbsp;";
									}
							?>
						</div>
						<a href="pertanyaan.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>" class="button-full button button-green uppercase ultrabold button-rounded" style="margin-top:60px;">KEMBALI</a>
					</div>
					
				</div>
			</div>
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>
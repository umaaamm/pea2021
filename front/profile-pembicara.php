<?php 
include 'inc/ceksession.php';
include 'inc/header.php'; 
include 'inc/secretkey.php';
include 'inc/library.php';
include 'inc/db_con.php'; 
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}
$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
	$id = $_REQUEST['id'];
	$nm_kantor =	dekripsi($_SESSION['nm_kanwil']);
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
					<span class="article-category color-white bg-green-dark uppercase">Profile Pembicara</span>
					<?php 
							$result=mysql_query("SELECT * FROM pevita_event where event_id='$id'");
							$row=mysql_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					
					echo'</div>';
					echo'</div>';
					echo'<div class="content">';
					echo '<p class="half-bottom">';
					echo 'Berikut adalah Profile Pembicara pada Acara '.$row[2].'.';
					echo'</p>';
					echo'</div>'
					
					?>
					<!--<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Tranformasi <?php echo $nm_kantor; ?></span>-->
				
					<!--Berikut adalah Profile Pembicara pada Acara Townhall Tranformasi <?php echo $nm_kantor; ?>.-->
				
			
			<div class="content" style="margin: 0px 20px 20px 20px !important;">
				<div class="decoration no-bottom">
				</div>
				<ul class="link-list">
					<?php
					if($id == 48 || $id == 50){
						include 'inc/db_con.php'; 
						$result=mysql_query("SELECT * FROM tm_profile where event_kanwil = '$kode_unit_kerja' AND event_id = '$id' ORDER BY TID ASC");
						if(mysql_num_rows($result) > 0) {
							while ($row=mysql_fetch_row($result)){
							$data=$row[0];
							$gambar = $row[9];
							$pesan = $row[8];
							$string = substr($pesan,0,30) ;
						echo "<li style='padding-top:0px !important'>
								<div data-deploy-menu='$row[0]' href='#' style='padding-left:5px !important; height: 100px;'>
									<div class='content' style='margin: 0px 20px 15px 20px !important;'><div class='news-list-item' style='float:left;'><img class=\"article-image preload-image\" data-src-retina=\"../portal/_foto/$gambar\" data-src=\"../portal/_foto/$gambar\"></div><div class='list-nama' style='width:60%; float:right; margin-bottom:2px !important;'><p style='font-size: 14px; color: black; font-weight:bold; text-align:left;'>$row[5]</p><div style='font-size: 12px;text-align: left;'>$row[6]</div></div></div>
								</div>
							  </li>";
						}
						}else{
							echo "<li><p><center>Maaf, profile pembicara belum tersedia untuk event ini.</center></p></li>";
						}

					}else{
						include 'inc/db_con.php'; 
						$result=mysql_query("SELECT * FROM tm_profile where event_kanwil = '$kode_unit_kerja' AND event_id = '$id' ORDER BY TID ASC");
						if(mysql_num_rows($result) > 0) {
							while ($row=mysql_fetch_row($result)){
							$data=$row[0];
							$gambar = $row[9];
							$pesan = $row[8];
							$string = substr($pesan,0,30) ;
						echo "<li style='padding-top:0px !important'>
								<a data-deploy-menu='$row[0]' href='profile-detail.php?q=$key&id=$id&nilai=$data' style='padding-left:5px !important; height: 100px;'>
									<div class='content' style='margin: 0px 20px 15px 20px !important;'><div class='news-list-item' style='float:left;'><img class=\"article-image preload-image\" data-src-retina=\"../portal/_foto/$gambar\" data-src=\"../portal/_foto/$gambar\"></div><div class='list-nama' style='width:60%; float:right; margin-bottom:2px !important;'><p style='font-size: 14px; color: black; font-weight:bold; text-align:left;'>$row[5]</p><div style='font-size: 12px;text-align: left;'>$row[6]</div><p style='margin-bottom:8px !important; color:#18574f !important;'>Selengkapnya</p></div></div>
								</a>
							  </li>";
						}
						}else{
							echo "<li><p><center>Maaf, profile pembicara belum tersedia untuk event ini.</center></p></li>";
						}

					}

					?>
					
				</ul>
				<br>
				<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			<br>
			<br>
			<br>
			</div>		
		</div> 
<?php include 'inc/footermenu.php' ?>		
	</div>
</div>
	</div>
	</div>
<?php include 'inc/footer.php'; ?>	
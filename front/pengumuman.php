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
$id = $_REQUEST['id'];
$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
$nm_kantor =	dekripsi($_SESSION['nm_kanwil']);
?>	

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
					<span class="article-category color-white bg-green-dark uppercase">PENGUMUMAN</span>
					<?php 
							$result=mysql_query("SELECT * FROM pevita_event where event_id='$id'");
							$row=mysql_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
					<!--<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Tranformasi</span>-->
					<!--<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Tranformasi <?php echo $nm_kantor; ?></span>-->
				</div>
			</div>
			
			<div class="content">
				<p class="half-bottom" style="text-align: left;">
					Berikut ini adalah list pengumuman-pengumuman selama acara berlangsung.
				</p>
			</div>
			
			<div class="content">
				<div class="decoration no-bottom">
				</div>
				<ul class="link-list materi">
					<?php
						include 'inc/db_con.php'; 
						$result=mysql_query("SELECT * FROM tm_pengumuman where event_kanwil = '$kode_unit_kerja' AND event_id = '$id' ORDER BY pid ASC");
						
						if(mysql_num_rows($result) > 0) {
							while ($row= mysql_fetch_array($result)){
								$data = $row [0];
								echo "<li><a data-deploy-menu='$row[0]' href='pengumuman-detail.php?q=$key&id=$id&nilai=$data' ><i class='fa fa-cloud-download font-16 color-green-light'></i>$row[5]</a></li>";
						
							}
							
						} 
						else {
							echo "<li><p><center>Maaf, pengumuman untuk saat ini  belum tersedia.</center></p></li>";
							
						}
						
							
					?>
					
				</ul>
				<br>
			<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			</div>		
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>	
</div>
	
<?php include 'inc/footer.php'; ?>	
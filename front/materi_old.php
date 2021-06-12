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
					<span class="article-category color-white bg-green-dark uppercase">DOWNLOAD MATERI</span>
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
				<p class="half-bottom">
					Download dan simpan materi di bawah ini selama acara berlangsung.
				</p>
			</div>
			
			<div class="content">
				<div class="decoration no-bottom">
				</div>
				<ul class="link-list materi">
					<?php
	
						
						
						$event_id			=	$id;

						
						$result=mysql_query("SELECT * FROM tm_materi_pevita where event_kanwil = '$kode_unit_kerja' AND event_id = '$event_id'");
						
						
						
						if(mysql_num_rows($result) > 0) {
							while ($row= mysql_fetch_array($result)){
								echo "<li><a data-deploy-menu='$row[0]' href='#'><i class='fa fa-cloud-download font-16 color-green-light'></i>$row[2]<i class='fa fa-angle-right'></i></a></li>";
							}
							
						} 
						else {
							echo "<li><p><center>Maaf, materi belum tersedia untuk event ini.</center></p></li>";
							
						}
							
					
							
						
						
						
						
					?>
					
				</ul>
				
				<br>
<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			<br>
			<br>
			</div>	
		
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
	<?php
		include 'inc/db_con.php';
		$result=mysql_query("SELECT * FROM tm_materi_pevita where event_kanwil = '$kode_unit_kerja' AND event_id = '$event_id'");
		while ($row=mysql_fetch_array($result)) {
			$ukuran = $row[4]/1024;
			echo "<div id='$row[0]' data-menu-size='280' class='menu-wrapper menu-light menu-bottom'>";
			echo "<div class='content'>";
			echo "<h5 class='color-black center-text uppercase ultrabold full-top half-bottom'></h5>";
			echo "<a href='../_download/$row[3]' target='_blank' class='dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large'>Download Materi</a>";
			echo "<em class='ultrasmall-text center-text color-gray-dark half-top'></em>";
			echo "</div>";
			echo "</div>";
		}
	?>
	
</div>
	
<?php include 'inc/footer.php'; ?>	
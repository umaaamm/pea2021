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
include 'inc/db_con.php'; 
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
					<?php
						$result1=mysql_query("SELECT * from tb_pevita_banner where event_kanwil = '$kode_unit_kerja' and event_id ='$id' and kode_menu='05'");
						$row2=mysql_fetch_row($result1);
						echo "<span class='article-image preload-image' data-src-retina='images/pictures/$row2[6]' data-src='images/pictures/$row2[6]'></span>";
					?>
					
					<span class="article-category color-white bg-green-dark uppercase">Venue</span>
					<?php 

							$result=mysql_query("SELECT * from tb_pevita_venue where event_kanwil = '$kode_unit_kerja' and event_id ='$id'");
							$row=mysql_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[11]</span>";
					?>
				</div>
			</div>
			
			<div class="content reading-time-box reading-words">
				<h4 class="small-bottom ultrabold">VENUE</h4>
				
					<div class="iframe-container">
  
<iframe src="https://launcher.pegadaian.co.id/pevita/front/flipbook/index.html" height="700px"  width="100%" allowfullscreen="" frameborder="0"></iframe>
	
</div>
							
				<br>
			<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			<br>
			<br>
			</div>
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
</div>
	
<?php include 'inc/footer.php'; ?>	
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
					<!-- <span class="article-overlay"></span> -->
						<span class="article-image preload-image" data-src-retina="images/pictures/slider-pea.jpg" data-src="images/pictures/slider-pea.jpg"></span>

				</div>
			</div>
			
			<div class="content reading-time-box reading-words">
				
				<div class="news-list-item">
					<?php 
						echo '<a href="sambutan-dirut.php?q='.$key.'&id='.$id.'">';
					?>
						<img class="preload-image" src="images/pictures/kuswiyoto.jpg" data-src="images/pictures/kuswiyoto.jpg" alt="kuswiyoto">
						<strong>Kuswiyoto</strong>
						<strong>CEO PT Pegadaian (Persero)</strong>
					</a>
					<span>Pegadaian Excellence Award 2019 </span>
				</div>
				<div class="news-list-item">
					<?php 
						echo '<a href="sambutan-dirti.php?q='.$key.'&id='.$id.'">';
					?>
						<img class="preload-image" src="images/pictures/teguh.jpg" data-src="images/pictures/teguh.jpg" alt="img">
						<strong>Teguh Wahyono</strong>
						<strong>CTO PT Pegadaian (Persero)</strong>
					</a>
					<span>Pegadaian Excellence Award 2019 </span>
				</div>	

			<br><br><br>
				<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			</div>
			<br>
			<br>
			<?php include 'inc/footermenu.php' ?>	
		</div>  
	</div>
</div>

<?php include 'inc/footer.php'; ?>	
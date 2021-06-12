<?php 
include 'inc/ceksession.php';
include 'inc/header.php'; 
include 'inc/secretkey.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}
$id = $_REQUEST['id'];

?>	

<div id="preloader" class="preloader-light">
	<h1></h1>
	<div id="preload-spinner"></div>
	<p>Pegadaian Event Assistant App.</p>
	<em>Initial Release v.1.0.b.20171206</em>
</div>

<div id="page-transitions">
	
	<?php 
		include 'inc/sidebarmenu.php';
		
	?>
	
	<!--<div id="header" class="header-logo-app header-dark">
		<a href="#" class="header-title back-button disabled">Pevita App.</a>
		<a href="menu.php?q=<?php echo KEY::SECRET_KEY;?>" class="header-logo"></a>
		<a href="menu.php?q=<?php echo KEY::SECRET_KEY;?>" class="header-icon header-icon-4"><i class="fa fa-home font-20"></i></a>
	</div>	-->
	
	<div id="page-content" class="page-content">

		<?php
			include 'inc/headermenu.php';
		?>		
		<div id="page-content-scroll" class="header-clear-large"><!--Enables this element to be scrolled --> 
		<video width="100%" controls autoplay>
				<source src="../portal/_video/rakernas2018.mp4" type="video/mp4">
				</video>
			<!--slider-->

				<!--<div>
					<div class="cover-overlay overlay bg-black opacity-10"></div>
					<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/sliderrakornas2.png" data-src="images/pictures/sliderrakornas2.png">
				</div>	-->

				<!-- <div>
					<div class="cover-overlay overlay bg-black opacity-10"></div>
					<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/semarang-3.png" data-src="images/pictures/semarang-3.png">
				</div> -->
		<?php
				
				
				
				//echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/slide-rakernas.jpeg" data-src="images/pictures/sliderPevita.png">';			
			//<!-- Menu Utama -->		
		
			
				
			?>
				<div class="decoration" style="margin-bottom: 50px!important;"></div>
				<br>
			</div>
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
</div>

<?php include 'inc/footer.php'; ?>	
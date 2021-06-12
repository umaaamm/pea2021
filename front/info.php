<?php 
include 'inc/header.php'; 
include 'inc/secretkey.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}
?>	

<div id="page-transitions">
	<?php include 'inc/sidebarmenu.php';?>				
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content close-menu">	
		<div id="page-content-scroll"><!--Enables this element to be scrolled -->
			
			<div class="cover-item">
				<div class="cover-content cover-content-center">
					<div class="content content-boxed content-boxed-padding">
						<h3 class="color-black center-text uppercase ultrabold half-top fa-2x">PEVITA</h3>
						<h4 class="color-black center-text uppercase font-14 color-green">Pegadaian Event Assistant App.</h4>
						<h5 class="color-black center-text opacity-50 thiner font-10">Initial Release v.2.0.b.20180801</h5>
						<p class="color-black center-text opacity-70 half-top font-12">
							Divisi Teknologi Informasi<br>PT Pegadaian (Persero) - Copyright 2018
						</p>
					</div>
				</div>
				<div class="cover-infinite-background"></div>
				
			</div>	
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
	
</div>
	
<?php include 'inc/footer2.php'; ?>	
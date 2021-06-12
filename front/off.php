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
	<?php include 'inc/top_nav.php'; ?>			
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content close-menu">	
		<div id="page-content-scroll"><!--Enables this element to be scrolled -->
			<div id="page-countdown">		
				<h1 class="center-text"><i class="fa fa-cog fa-spin fa-2x opacity-20 full-bottom"></i></h1>
				<h1 class="uppercase center-text">OFF MODE</h1>
				<h2 class="uppercase center-text full-bottom"> Fitur ini belum diaktifkan hingga pelaksaan Pembukaan Acara.</h2>
				<p class="center-text">	</p>
			</div>	
		</div>  
	</div>
</div>
	
<?php include 'inc/footer.php'; ?>	
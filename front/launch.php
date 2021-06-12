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
			
			<div class="cover-item" style="background-image:url(images/pictures_vertical/bg-launch.jpg);">
				<div class="cover-content cover-content-center">
					<p class="center-text color-white">
						Pegadaian Digital Service &amp; Aplikasi Keagenan dapat Anda unduh disini!
					</p>
					<h1 class="uppercase ultrabold center-text color-white fa-3x half-top">S E G E R A</h1>
					<h6 class="thin center-text color-white opacity-50 half-bottom"></h6>
					<div class="decoration deco-3 opacity-10"></div>
					<div class="countdown color-white full-bottom">
						<div class="countdown-years disabled">
							<div id="years"></div>
							<em>tahun</em>
						</div>
						<div class="countdown-days">
							<div id="days"></div>
							<em>hari</em>
						</div>
						<div class="countdown-hours">
							<div id="hours"></div>
							<em>jam</em>
						</div>				
						<div class="countdown-minutes">
							<div id="minutes"></div>
							<em>menit</em>
						</div>
						<div class="countdown-seconds">
							<div id="seconds"></div>
							<em>detik</em>
						</div>	
						<div class="clear"></div>
						<div class="decoration deco-3 opacity-10 half-top"></div>
					</div>
				</div>
				<div class="cover-overlay overlay overlay-dark"></div>
			</div>	
		</div>  
	</div>
</div>
	
<?php include 'inc/footer.php'; ?>	
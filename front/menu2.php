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
			<!--slider-->
			<div class="single-slider owl-carousel owl-has-dots-over">
				<div>
					<div class="cover-overlay overlay bg-black opacity-10"></div>
					<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/sliderPevita-gstar.png" data-src="images/pictures/sliderPevita.png">
				</div>
				<!--<div>
					<div class="cover-overlay overlay bg-black opacity-10"></div>
					<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/sliderrakornas2.png" data-src="images/pictures/sliderrakornas2.png">
				</div>	-->

				<!-- <div>
					<div class="cover-overlay overlay bg-black opacity-10"></div>
					<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/semarang-3.png" data-src="images/pictures/semarang-3.png">
				</div> -->	
				<div>
					<div class="cover-overlay overlay bg-black opacity-10"></div>
					<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/slider4.jpg" data-src="images/pictures/slider4.jpg">
				</div> 			
			</div>	
			<!-- Menu Utama -->		
		
			<div class="store-categories">
				<!-- <a href="sambutan.php?q=<?php echo KEY::SECRET_KEY;?>"><i class="fa fa-address-card color-blue-dark fa-2x"></i><em>Sambutan</em></a> -->
				<a href="rundown.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-calendar color-gray-dark fa-2x"></i><em>Rundown</em></a>
				<a href="materi.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-cloud-download color-red-dark fa-2x"></i><em>Materi</em></a>
				<a href="absensi.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-file color-brown-dark fa-2x font-36"></i><em>Absensi</em></a>
			<!--<a href="dresscode.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-street-view color-brown-dark fa-2x"></i><em>Dresscode</em></a> -->
			<!--<a href="venue.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-map-marker color-blue-dark fa-2x"></i><em>Venue</em></a> -->
			<!--<a href="peserta.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Peserta</em></a> -->
				<a href="profile-pembicara.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Profile Pembicara</em></a>
				<a href="pertanyaan.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-question-circle-o fa-2x"></i><em>Bertanya</em></a>			
			<!--<a href="info.php?q=<?php echo KEY::SECRET_KEY;?>"><i class="fa fa-info-circle color-brown-dark fa-2x"></i><em>Info</em></a> -->
				<a href="pengumuman.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-exclamation-circle color-gray-dark fa-2x font-36"></i><em>Pengumuman</em></a>
				<a href="profile-user.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-user color-green-dark fa-2x font-36"></i><em>Profile User</em></a>
				<a href="kontak.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-comments color-brown-dark fa-2x"></i><em>Hubungi Kami</em></a>
				<a href="testimoni2.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>"><i class="fa fa-bullhorn fa-2x"></i><em>Testimoni</em></a>
				<div class="decoration" style="margin-bottom: 50px!important;"></div>
				<br>
			</div>
			<br>
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
</div>

<?php include 'inc/footer.php'; ?>	
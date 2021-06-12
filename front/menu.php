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

				<!--<div>
					<div class="cover-overlay overlay bg-black opacity-10"></div>
					<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/sliderrakornas2.png" data-src="images/pictures/sliderrakornas2.png">
				</div>	-->

				<!-- <div>
					<div class="cover-overlay overlay bg-black opacity-10"></div>
					<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/semarang-3.png" data-src="images/pictures/semarang-3.png">
				</div> -->
		<?php
				
			

				if ($id == 68) {
				//echo '<div>';
				//echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
				//echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/sliderPevita-gstar.png" data-src="images/pictures/sliderPevita.png">';
				//echo '</div>';				
				echo '<div>';
				echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
				echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/slider4.jpg" data-src="images/pictures/slider4.jpg">';
				echo '</div>'; 			
				echo '</div>';	
			//<!-- Menu Utama -->		
		
				echo '<div class="store-categories">';
					//echo '<a href="sambutan.php?q='.$key.'&id='.$id.'"><i class="fa fa-address-card color-blue-dark fa-2x"></i><em>Sambutan</em></a>';
					echo '<a href="rundown.php?q='.$key.'&id='.$id.'"><i class="fa fa-calendar color-gray-dark fa-2x"></i><em>Rundown</em></a>';
					echo '<a href="materi.php?q='.$key.'&id='.$id.'"><i class="fa fa-cloud-download color-red-dark fa-2x"></i><em>Materi</em></a>';
					echo '<a href="absensi.php?q='.$key.'&id='.$id.'"><i class="fa fa-file color-brown-dark fa-2x font-36"></i><em>Absensi</em></a>';
					echo '<a href="dresscode.php?q='.$key.'&id='.$id.'"><i class="fa fa-street-view color-brown-dark fa-2x"></i><em>Dresscode</em></a>';
					echo '<a href="venue.php?q='.$key.'&id='.$id.'"><i class="fa fa-map-marker color-blue-dark fa-2x"></i><em>Venue</em></a>';
					//echo '<a href="peserta.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Peserta</em></a>';
					//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Profile Pembicara</em></a>';
					//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Pembicara</em></a>';
					echo '<a href="pertanyaan.php?q='.$key.'&id='.$id.'"><i class="fa fa-question-circle-o fa-2x"></i><em>Bertanya</em></a>';			
					//echo '<a href="info.php?q='.$key.'"><i class="fa fa-info-circle color-brown-dark fa-2x"></i><em>Info</em></a>';
					echo '<a href="pengumuman.php?q='.$key.'&id='.$id.'"><i class="fa fa-exclamation-circle color-gray-dark fa-2x font-36"></i><em>Pengumuman</em></a>';
					echo '<a href="profile-user.php?q='.$key.'&id='.$id.'"><i class="fa fa-user color-green-dark fa-2x font-36"></i><em>Profile User</em></a>';
					echo '<a href="kontak.php?q='.$key.'&id='.$id.'"><i class="fa fa-comments color-brown-dark fa-2x"></i><em>Hubungi Kami</em></a>';
					echo '<a href="testimoni2.php?q='.$key.'&id='.$id.'"><i class="fa fa-bullhorn fa-2x"></i><em>Testimoni</em></a>';
				}
				else if ($id == 96){		
					echo '<div>';
					echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
					echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/banner3_rakorwil_medan2019.jpg" data-src="images/pictures/banner1_rakorwil_medan2019.jpg">';
					echo '</div>';				
					echo '<div>';
					echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
					echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/slider4.jpg" data-src="images/pictures/slider4.jpg">';
					echo '</div>'; 			
					echo '</div>';	
			//<!-- Menu Utama -->		
			echo '<div class="store-categories">';
			//echo '<a href="sambutan.php?q='.$key.'&id='.$id.'"><i class="fa fa-address-card color-blue-dark fa-2x"></i><em>Sambutan</em></a>';
			echo '<a href="rundown.php?q='.$key.'&id='.$id.'"><i class="fa fa-calendar color-gray-dark fa-2x"></i><em>Rundown</em></a>';
			//echo '<a href="materi.php?q='.$key.'&id='.$id.'"><i class="fa fa-cloud-download color-red-dark fa-2x"></i><em>Materi</em></a>';
			echo '<a href="absensi.php?q='.$key.'&id='.$id.'"><i class="fa fa-file color-brown-dark fa-2x font-36"></i><em>Absensi</em></a>';
			echo '<a href="dresscode.php?q='.$key.'&id='.$id.'"><i class="fa fa-street-view color-brown-dark fa-2x"></i><em>Dresscode</em></a>';
			//echo '<a href="venue.php?q='.$key.'&id='.$id.'"><i class="fa fa-map-marker color-blue-dark fa-2x"></i><em>Venue</em></a>';
			//echo '<a href="peserta.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Peserta</em></a>';
			//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Profile Pembicara</em></a>';
			//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Pembicara</em></a>';
			//echo '<a href="pertanyaan.php?q='.$key.'&id='.$id.'"><i class="fa fa-question-circle-o fa-2x"></i><em>Bertanya</em></a>';			
			//echo '<a href="info.php?q='.$key.'"><i class="fa fa-info-circle color-brown-dark fa-2x"></i><em>Info</em></a>';
			//echo '<a href="pengumuman.php?q='.$key.'&id='.$id.'"><i class="fa fa-exclamation-circle color-gray-dark fa-2x font-36"></i><em>Pengumuman</em></a>';
			echo '<a href="profile-user.php?q='.$key.'&id='.$id.'"><i class="fa fa-user color-green-dark fa-2x font-36"></i><em>Profile User</em></a>';
			//echo '<a href="kontak.php?q='.$key.'&id='.$id.'"><i class="fa fa-comments color-brown-dark fa-2x"></i><em>Hubungi Kami</em></a>';
			//echo '<a href="testimoni2.php?q='.$key.'&id='.$id.'"><i class="fa fa-bullhorn fa-2x"></i><em>Testimoni</em></a>';
		
				}
				else if ($id == 67 || $id == 74){		
					echo '<div>';
					echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
					echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/slider4.jpg" data-src="images/pictures/slider4.jpg">';
					echo '</div>'; 			
					echo '</div>';	
			//<!-- Menu Utama -->		
			echo '<div class="store-categories">';
			//echo '<a href="sambutan.php?q='.$key.'&id='.$id.'"><i class="fa fa-address-card color-blue-dark fa-2x"></i><em>Sambutan</em></a>';
			echo '<a href="rundown.php?q='.$key.'&id='.$id.'"><i class="fa fa-calendar color-gray-dark fa-2x"></i><em>Rundown</em></a>';
			echo '<a href="materi.php?q='.$key.'&id='.$id.'"><i class="fa fa-cloud-download color-red-dark fa-2x"></i><em>Materi</em></a>';
			echo '<a href="absensi.php?q='.$key.'&id='.$id.'"><i class="fa fa-file color-brown-dark fa-2x font-36"></i><em>Absensi</em></a>';
			echo '<a href="dresscode.php?q='.$key.'&id='.$id.'"><i class="fa fa-street-view color-brown-dark fa-2x"></i><em>Dresscode</em></a>';
			echo '<a href="venue.php?q='.$key.'&id='.$id.'"><i class="fa fa-map-marker color-blue-dark fa-2x"></i><em>Venue</em></a>';
			//echo '<a href="peserta.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Peserta</em></a>';
			//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Profile Pembicara</em></a>';
			//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Pembicara</em></a>';
			echo '<a href="pertanyaan.php?q='.$key.'&id='.$id.'"><i class="fa fa-question-circle-o fa-2x"></i><em>Bertanya</em></a>';			
			//echo '<a href="info.php?q='.$key.'"><i class="fa fa-info-circle color-brown-dark fa-2x"></i><em>Info</em></a>';
			
			echo '<a href="profile-user.php?q='.$key.'&id='.$id.'"><i class="fa fa-user color-green-dark fa-2x font-36"></i><em>Profile User</em></a>';
			echo '<a href="kontak.php?q='.$key.'&id='.$id.'"><i class="fa fa-comments color-brown-dark fa-2x"></i><em>Hubungi Kami</em></a>';
			//echo '<a href="testimoni2.php?q='.$key.'&id='.$id.'"><i class="fa fa-bullhorn fa-2x"></i><em>Testimoni</em></a>';
		
				}  
				else if ($id == 65 || $id == 72 || $id == 73){		
					echo '<div>';
					echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
					echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/slider4.jpg" data-src="images/pictures/slider4.jpg">';
					echo '</div>'; 			
					echo '</div>';	
			//<!-- Menu Utama -->		
			echo '<div class="store-categories">';
			//echo '<a href="sambutan.php?q='.$key.'&id='.$id.'"><i class="fa fa-address-card color-blue-dark fa-2x"></i><em>Sambutan</em></a>';
			echo '<a href="rundown.php?q='.$key.'&id='.$id.'"><i class="fa fa-calendar color-gray-dark fa-2x"></i><em>Rundown</em></a>';
			echo '<a href="materi.php?q='.$key.'&id='.$id.'"><i class="fa fa-cloud-download color-red-dark fa-2x"></i><em>Materi</em></a>';
			echo '<a href="absensi.php?q='.$key.'&id='.$id.'"><i class="fa fa-file color-brown-dark fa-2x font-36"></i><em>Absensi</em></a>';
			echo '<a href="dresscode.php?q='.$key.'&id='.$id.'"><i class="fa fa-street-view color-brown-dark fa-2x"></i><em>Dresscode</em></a>';
			//echo '<a href="venue.php?q='.$key.'&id='.$id.'"><i class="fa fa-map-marker color-blue-dark fa-2x"></i><em>Venue</em></a>';
			//echo '<a href="peserta.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Peserta</em></a>';
			//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Profile Pembicara</em></a>';
			//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Pembicara</em></a>';
			echo '<a href="pertanyaan.php?q='.$key.'&id='.$id.'"><i class="fa fa-question-circle-o fa-2x"></i><em>Bertanya</em></a>';			
			//echo '<a href="info.php?q='.$key.'"><i class="fa fa-info-circle color-brown-dark fa-2x"></i><em>Info</em></a>';
			//echo '<a href="pengumuman.php?q='.$key.'&id='.$id.'"><i class="fa fa-exclamation-circle color-gray-dark fa-2x font-36"></i><em>Pengumuman</em></a>';
			echo '<a href="profile-user.php?q='.$key.'&id='.$id.'"><i class="fa fa-user color-green-dark fa-2x font-36"></i><em>Profile User</em></a>';
			echo '<a href="kontak.php?q='.$key.'&id='.$id.'"><i class="fa fa-comments color-brown-dark fa-2x"></i><em>Hubungi Kami</em></a>';
			echo '<a href="testimoni2.php?q='.$key.'&id='.$id.'"><i class="fa fa-bullhorn fa-2x"></i><em>Testimoni</em></a>';
		
				} else if ($id == 99){		
					echo '<div>';
					echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
					echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/slider4.jpg" data-src="images/pictures/slider4.jpg">';
					echo '</div>'; 			
					echo '</div>';	
			//<!-- Menu Utama -->		
			echo '<div class="store-categories">';
			//echo '<a href="sambutan.php?q='.$key.'&id='.$id.'"><i class="fa fa-address-card color-blue-dark fa-2x"></i><em>Sambutan</em></a>';
			echo '<a href="rundown.php?q='.$key.'&id='.$id.'"><i class="fa fa-calendar color-gray-dark fa-2x"></i><em>Rundown</em></a>';
			//echo '<a href="materi.php?q='.$key.'&id='.$id.'"><i class="fa fa-cloud-download color-red-dark fa-2x"></i><em>Materi</em></a>';
			echo '<a href="absensi.php?q='.$key.'&id='.$id.'"><i class="fa fa-file color-brown-dark fa-2x font-36"></i><em>Absensi</em></a>';
			//echo '<a href="dresscode.php?q='.$key.'&id='.$id.'"><i class="fa fa-street-view color-brown-dark fa-2x"></i><em>Dresscode</em></a>';
			//echo '<a href="venue.php?q='.$key.'&id='.$id.'"><i class="fa fa-map-marker color-blue-dark fa-2x"></i><em>Venue</em></a>';
			//echo '<a href="peserta.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Peserta</em></a>';
			//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Profile Pembicara</em></a>';
			//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Pembicara</em></a>';
			//echo '<a href="pertanyaan.php?q='.$key.'&id='.$id.'"><i class="fa fa-question-circle-o fa-2x"></i><em>Bertanya</em></a>';	
			//echo '<a href="../_download/ROOM.pdf" target="_blank"><i class="fa fa-exclamation-circle color-gray-dark fa-2x font-36"></i><em>Download Daftar Kamar</em></a>';		
			//echo '<a href="info.php?q='.$key.'"><i class="fa fa-info-circle color-brown-dark fa-2x"></i><em>Info</em></a>';
			//echo '<a href="pengumuman.php?q='.$key.'&id='.$id.'"><i class="fa fa-exclamation-circle color-gray-dark fa-2x font-36"></i><em>Pengumuman</em></a>';
			echo '<a href="profile-user.php?q='.$key.'&id='.$id.'"><i class="fa fa-user color-green-dark fa-2x font-36"></i><em>Profile User</em></a>';
			//echo '<a href="kontak.php?q='.$key.'&id='.$id.'"><i class="fa fa-comments color-brown-dark fa-2x"></i><em>Hubungi Kami</em></a>';
			//echo '<a href="testimoni2.php?q='.$key.'&id='.$id.'"><i class="fa fa-bullhorn fa-2x"></i><em>Testimoni</em></a>';
		
				} 
				else if ($id == 97){	
					echo '<div>';
					echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
					echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/slider_rakerter.jpeg" data-src="images/pictures/slider_rakor_deputi_bisnis_01.jpeg">';
					echo '</div>';	
					echo '<div>';
					echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
					echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/slider4.jpg" data-src="images/pictures/slider4.jpg">';
					echo '</div>'; 			
					echo '</div>';	
			//<!-- Menu Utama -->		
			echo '<div class="store-categories">';
			//echo '<a href="sambutan.php?q='.$key.'&id='.$id.'"><i class="fa fa-address-card color-blue-dark fa-2x"></i><em>Sambutan</em></a>';
			echo '<a href="rundown.php?q='.$key.'&id='.$id.'"><i class="fa fa-calendar color-gray-dark fa-2x"></i><em>Rundown</em></a>';
			echo '<a href="materi.php?q='.$key.'&id='.$id.'"><i class="fa fa-cloud-download color-red-dark fa-2x"></i><em>Materi</em></a>';
			echo '<a href="absensi.php?q='.$key.'&id='.$id.'"><i class="fa fa-file color-brown-dark fa-2x font-36"></i><em>Absensi</em></a>';
			echo '<a href="dresscode.php?q='.$key.'&id='.$id.'"><i class="fa fa-street-view color-brown-dark fa-2x"></i><em>Dresscode</em></a>';
			//echo '<a href="venue.php?q='.$key.'&id='.$id.'"><i class="fa fa-map-marker color-blue-dark fa-2x"></i><em>Venue</em></a>';
			//echo '<a href="peserta.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Peserta</em></a>';
			//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Profile Pembicara</em></a>';
			//echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Pembicara</em></a>';
			//echo '<a href="pertanyaan.php?q='.$key.'&id='.$id.'"><i class="fa fa-question-circle-o fa-2x"></i><em>Bertanya</em></a>';	
			//echo '<a href="../_download/ROOM.pdf" target="_blank"><i class="fa fa-exclamation-circle color-gray-dark fa-2x font-36"></i><em>Download Daftar Kamar</em></a>';		
			echo '<a href="info.php?q='.$key.'"><i class="fa fa-info-circle color-brown-dark fa-2x"></i><em>Info</em></a>';
			//echo '<a href="pengumuman.php?q='.$key.'&id='.$id.'"><i class="fa fa-exclamation-circle color-gray-dark fa-2x font-36"></i><em>Pengumuman</em></a>';
			echo '<a href="profile-user.php?q='.$key.'&id='.$id.'"><i class="fa fa-user color-green-dark fa-2x font-36"></i><em>Profile User</em></a>';
			//echo '<a href="kontak.php?q='.$key.'&id='.$id.'"><i class="fa fa-comments color-brown-dark fa-2x"></i><em>Hubungi Kami</em></a>';
			//echo '<a href="testimoni2.php?q='.$key.'&id='.$id.'"><i class="fa fa-bullhorn fa-2x"></i><em>Testimoni</em></a>';
		
				} 
				else{
				//echo '<div>';
				//echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
				//echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/g_values.jpg" data-src="images/pictures/sliderPevita.png">';
				//echo '</div>';	
			
				echo '<div>';
				echo '<div class="cover-overlay overlay bg-black opacity-10"></div>';
				echo '<img width="700" class="owl-lazy" src="images/empty.png" data-src="images/pictures/slider-pea.jpg" data-src="images/pictures/slider-pea.jpg">';
				echo '</div>'; 			
				echo '</div>';	
			//<!-- Menu Utama -->		
		
			echo '<div class="store-categories">';
					echo '<a href="sambutan-pea.php?q='.$key.'&id='.$id.'"><i class="fa fa-address-card color-brown-dark fa-2x"></i><em>Sambutan</em></a>';
					echo '<a href="rundown.php?q='.$key.'&id='.$id.'"><i class="fa fa-calendar color-brown-dark fa-2x"></i><em>Rundown</em></a>';
					echo '<a href="materi.php?q='.$key.'&id='.$id.'"><i class="fa fa-cloud-download color-red-dark fa-2x"></i><em>Materi</em></a>';
					echo '<a href="pertanyaan.php?q='.$key.'&id='.$id.'"><i class="fa fa-question-circle-o fa-2x"></i><em>Bertanya</em></a>';	
					echo '<a href="absensi.php?q='.$key.'&id='.$id.'"><i class="fa fa-file color-brown-dark fa-2x font-36"></i><em>Absensi</em></a>';
					echo '<a href="dresscode.php?q='.$key.'&id='.$id.'"><i class="fa fa-street-view color-brown-dark fa-2x"></i><em>Dresscode</em></a>';
					echo '<a href="venue.php?q='.$key.'&id='.$id.'"><i class="fa fa-map-marker color-brown-dark fa-2x"></i><em>Venue</em></a>';
					echo '<a href="profile-pembicara.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Pembicara</em></a>';
					//echo '<a href="peserta.php?q='.$key.'&id='.$id.'"><i class="fa fa-users color-brown-dark fa-2x"></i><em>Peserta</em></a>';
					echo '<a href="kontak.php?q='.$key.'&id='.$id.'"><i class="fa fa-comments color-brown-dark fa-2x"></i><em>Hubungi Kami</em></a>';
					echo '<a href="seat.php?q='.$key.'&id='.$id.'"><i class="fa fa-slideshare color-brown-dark fa-2x"></i><em>Daftar Kursi</em></a>';
					//echo '<a href="#"></a>';
					echo '<a href="pengumuman.php?q='.$key.'&id='.$id.'"><i class="fa fa-exclamation-circle color-gray-dark fa-2x font-36"></i><em>Pengumuman</em></a>';
					
				}
			?>
				<div class="decoration" style="margin-bottom: 50px!important;"></div>
				<br>
			</div>
			<br>
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
</div>

<?php include 'inc/footer.php'; ?>	
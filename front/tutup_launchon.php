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
	
	<div id="page-content" class="page-content">	
		<div id="page-content-scroll"><!--Enables this element to be scrolled -->
		
			<div class="article-card article-full full-bottom">
				<div class="article-header">
					<span class="article-overlay"></span>
					<span class="article-image preload-image" data-src-retina="images/pictures/launchon.png" data-src="images/pictures/launchon.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">DOWNLOAD APLIKASI</span>
					<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Rakernas 2017-2018</span>
				</div>
			</div>
			
			<div class="content">
				<p class="half-bottom">
					Download Aplikasi Pegadaian Digital disini!
				</p>
			</div>
			
			
			<div class="content">
				<div class="decoration no-bottom"></div>
				<ul class="link-list">
					<li><a data-deploy-menu="menu-sheet-pds" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Download Aplikasi Pegadaian Digital<i class="fa fa-angle-right"></i></a></li>
					
				</ul>
			</div>		
		</div>  
	</div>

			<div id="menu-sheet-pds" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom">DOWNLOAD SEKARANG</h5>
					<a href="../download/rakernas/PegadaianDigital-061217-beta4.apk" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Download PDS (21MB)</a>
					
					<em class="ultrasmall-text center-text color-gray-dark half-top">Aplikasi hanya tersedia untuk sistem operasi Android</em>
				</div>
			</div>	

</div>
	
<?php include 'inc/footer.php'; ?>	
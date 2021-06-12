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
	
	<!-- Menu -->
		
	<div id="page-content" class="page-content page-content-gray">	
		<div id="page-content-scroll" class="header-clear-larger"><!--Enables this element to be scrolled --> 	
			
			<div id="page-vcard" class="content content-boxed content-boxed-padding">
				<div class="vcard-header">
					<img data-src="images/pictures/0s.png" src="images/empty.png" class="preload-image">
					<p class="bold large-text" style="font-size:25px !important; padding-top:34px;">PROFILE</p>
					<div class="blank"style="margin-bottom:50px;"></div>
				</div>
				<div class="decoration opacity-90 no-bottom"></div>
				
				<h1 class="vcard-title color-blue-dark">Adhitya Nugroho</h1>
				<div class="vcard-field"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ornare augue a venenatis vulputate. Etiam lacinia, sem ac blandit ultricies, nulla neque dapibus dui, et gravida orci dui eu est. Duis at ligula id metus tempus fermentum. Sed convallis eleifend malesuada. Nam magna ipsum, consequat rhoncus tellus dictum, imperdiet egestas velit. Vivamus aliquet, elit et lacinia fringilla, odio erat lobortis justo, molestie posuere sapien turpis sed arcu. Duis vel laoreet orci. Proin sapien dui, lobortis in sodales eget, fringilla vitae felis. In ac semper lorem, ut ultrices massa</p></div>
								
				
			</div>
			
			
		</div>  
	</div>
	
	<a href="#" class="back-to-top-badge back-to-top-small"><i class="fa fa-angle-up"></i>Back to Top</a>
</div>
	
<?php include 'inc/footer.php'; ?>	
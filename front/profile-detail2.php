<?php 
include 'inc/header.php'; 
include 'inc/secretkey.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
	
}

include 'inc/db_con.php'; 
$nilai=$_GET['nilai'];
?>	

<div id="page-transitions">
<?php include 'inc/top_nav.php'; ?>			
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<!-- Menu -->
<?php

	$result=mysql_query("SELECT * FROM tm_profile where tid=$nilai");
	$row=mysql_fetch_array($result);					

	$gambar = $row[8];
	$nama = $row[5];
	$profile = $row[6];
	echo $nilai;
	echo "<div id='page-content' class='page-content page-content-gray'>";	
		echo "<div id='page-content-scroll' class='header-clear-larger'>";
			echo "<div id='page-vcard' class='content content-boxed content-boxed-padding'>";
				echo "<div class='vcard-header'>";
					echo "<img data-src-retina=\"../portal/_foto/$gambar\" data-src=\"../portal/_foto/$gambar\">";
						echo "<p class='bold large-text' style='font-size:25px !important; padding-top:34px;'>PROFILE</p>";
					echo "<div class='blank'style='margin-bottom:50px;'></div>";
				echo "</div>";
				echo "<div class='decoration opacity-90 no-bottom'></div>";
				
				echo "<h1 class='vcard-title color-blue-dark'>$nama</h1>";
	
				echo "<div class='vcard-field'>$profile</div>";
								
				
			echo "</div>";
			
			
		echo "</div>";  
	echo "</div>";
?>	
	<a href="#" class="back-to-top-badge back-to-top-small"><i class="fa fa-angle-up"></i>Back to Top</a>
</div>
	
<?php include 'inc/footer.php'; ?>	
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
					<span class="article-image preload-image" data-src-retina="images/pictures/materi.png" data-src="images/pictures/materi.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Profile Pembicara</span>
					<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Raker Kantor Wilayah XII Surabaya 2018</span>
				</div>
			</div>
			
			<div class="content">
				<p class="half-bottom">
					Berikut adalah Profile Pembicara pada rakor ini.
				</p>
			</div>
			
			<div class="content">
				<div class="decoration no-bottom">
				</div>
				<ul class="link-list">
					<?php
						include 'inc/db_con.php'; 
						$result=mysql_query('SELECT * FROM tm_profile');
						while ($row=mysql_fetch_row($result)){
							echo "<li><a data-deploy-menu='$row[0]' href='profile-detail.php?q=P82371'><i class='fa fa-cloud-download font-16 color-green-light'></i>$row[5]<i class='fa fa-angle-right'></i></a></li>";
						}
					?>
					
				</ul>
			</div>		
		</div>  
	</div>
	
	
</div>
	
<?php include 'inc/footer.php'; ?>	
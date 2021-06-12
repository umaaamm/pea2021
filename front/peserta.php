<?php 
include 'inc/ceksession.php';
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
					<!-- <span class="article-overlay"></span> -->
					<span class="article-image preload-image" data-src-retina="images/pictures/slider-pea.jpg" data-src="images/pictures/slider-pea.jpg"></span>
					<span class="article-category color-white bg-green-dark uppercase">Peserta</span>
					<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i>Pegadaian Excellence Award 2019</span>
					<span class="article-author color-gray-light"></span>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<h6 class="small-bottom ultrabold" style="text-align: left !important; margin-bottom: 20px !important; line-height: 15px !important">PESERTA PEGADAIAN EXCELLENCE AWARD 2019</h6>
				<div class="content">
					<?php
						include 'inc/db_con.php'; 
						$result=mysql_query('SELECT * FROM tb_pevita_user WHERE event_kanwil=00633');
						//$result=mysql_query('SELECT * FROM tb_pevita_peserta');
						while ($row=mysql_fetch_row($result)){
							echo "<div class='news-list-item2'>";
							echo "<a href='#'>";
							echo "<strong>$row[1]</strong>";
							echo "</a>";
							echo "<span><i class='fa fa-suitcase'></i>&nbsp;&nbsp;$row[4] - $row[14]</span>";
							echo "</div>";
						}
					?>
				</div>
			</div>
		</div>  
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
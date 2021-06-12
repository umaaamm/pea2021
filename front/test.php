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
					<span class="article-overlay"></span>
					<span class="article-image preload-image" data-src-retina="images/pictures/peserta.png" data-src="images/pictures/peserta.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Peserta</span>
					<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i>Rakornas PT Pegadaian (Persero) Tahun 2018</span>
					<span class="article-author color-gray-light"></span>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<h6 class="small-bottom ultrabold" style="text-align: left !important; margin-bottom: 20px !important; line-height: 15px !important">PESERTA RAKORNAS PT PEGADAIAN (PERSERO) TAHUN 2018</h6>
				<div class="content">
					
					<?php
					echo '<div class=\'news-list-item2\'>';
						//	echo '<form action="generate.php?q='.$key.'" method="post">';
						include 'inc/db_con.php'; 
						$result=mysql_query("SELECT * FROM tb_pevita_jadwal where in_class='1'");
						//$result=mysql_query('SELECT * FROM tb_pevita_peserta');
						
						while ($row=mysql_fetch_array($result)){
							
							$id_jadwal = $row["id"];
							$no 		= $id_jadwal;
							$nama_acara = $row["nama_acara"];
							
						echo '<a href="generate.php?q='.$key.'&id='.$id_jadwal.'&id_jadwal='.$id_jadwal.'&nama_acara='.$nama_acara.'" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >'.$row[nama_acara].'</a>';
							//echo '<input type="submit" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton" id="contactSubmitButton'.$no.'" name="contactSubmitButton'.$no.'" value="'.$row[nama_acara].'" data-formId="contactForm" />';
							echo '<input type="hidden" name="idjadwal'.$no.'" id="idjadwal'.$no.'" value="'.$id_jadwal.'" />';
							echo '<input type="hidden" name="namaacara'.$no.'" id="namaacara'.$no.'" value="'.$nama_acara.'" />';
							//echo '<a href="generate.php?key='.$key.'&id='.$id_jadwal.'&acara='.$nama_acara.'">afsfasfasf</a>';
						
						}
						//	echo '</form>';
							echo "</div>";
					?>
				</div>
			</div>
		</div>  
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
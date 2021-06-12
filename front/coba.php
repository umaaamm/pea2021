<?php 
include 'inc/ceksession.php';
include 'inc/header.php'; 
include 'inc/secretkey.php';
include 'inc/library.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}

$kode_unit_kerja	= $_SESSION['kode_unit_kerja'];
?>	

<div id="page-transitions">
	<?php 
		include 'inc/sidebarmenu.php';
		
	?>						
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content">
		<?php
			include 'inc/headermenu.php';
		?>		
		<div id="page-content-scroll"><!--Enables this element to be scrolled -->
			
			<div class="article-card article-full full-bottom">
				<div class="article-header">
					<span class="article-overlay"></span>
					<span class="article-image preload-image" data-src-retina="images/pictures/peserta.png" data-src="images/pictures/peserta.png"></span>
					<?php 
					$namaku				= dekripsi($_SESSION['nama']);
					$nikku				= dekripsi($_SESSION['username']);
					echo "<span class='article-category color-white bg-green-dark uppercase'>Selamat Datang, $namaku</span>";
					?>
					
					<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i>Pevita (Pegadaian Virtual Assistant)</span>
					<span class="article-author color-gray-light"></span>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<h6 class="small-bottom ultrabold" style="text-align: left !important; margin-bottom: 20px !important; line-height: 15px !important"><CENTER>SILAKAN PILIH EVENT ANDA</CENTER></h6>
				<div class="content">
					
					<?php
					echo '<div class=\'news-list-item2\'>';
						include 'inc/db_con.php'; 
						
						$unit_kerja 		= dekripsi($kode_unit_kerja);
						
						//	echo '<form action="generate.php?q='.$key.'" method="post">';
						
						$result=mysql_query("SELECT * FROM pevita_event where event_date_end >= curdate() AND event_kanwil = $unit_kerja");
						//$result=mysql_query('SELECT * FROM tb_pevita_peserta');
						
						
						while ($row=mysql_fetch_array($result)){
							
							$event_id   = $row["event_id"];
							$event_name = $row["event_name"];
							$en_kode_kanwil = enkripsi($row["event_kanwil"]);
							
							
						echo '<a href="cekabsen.php?q='.$key.'&id='.$event_id.'" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >'.$row[event_name].'</a>';

							//echo '<input type="submit" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton" id="contactSubmitButton'.$no.'" name="contactSubmitButton'.$no.'" value="'.$row[nama_acara].'" data-formId="contactForm" />';
							
						
						}
						//	echo '</form>';
							echo "</div>";
					?>
				</div>
			</div>
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
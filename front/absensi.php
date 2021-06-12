<?php 
include 'inc/db_con.php';
include 'inc/ceksession.php';
include 'inc/header.php'; 
include 'inc/secretkey.php';
include 'inc/library.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}
$id = $_REQUEST['id'];
$kode_unit_kerja = dekripsi($_SESSION['kode_unit_kerja']);
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
					<span class="article-category color-white bg-green-dark uppercase">Absen Peserta</span>
					<?php 
							$result=mysqli_query($koneksi, "SELECT * FROM pevita_event where event_id='$id'");
							$row=mysqli_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<h6 class="small-bottom ultrabold" style="text-align: left !important; margin-bottom: 20px !important; line-height: 15px !important"><center>Pilih Event</center></h6>
				<div class="content">
					
					<?php
					echo '<div class=\'news-list-item2\'>';
						//	echo '<form action="generate.php?q='.$key.'" method="post">';
						include 'inc/db_con.php'; 
						$result=mysqli_query($koneksi, "SELECT event_name FROM pevita_event  where event_id=$id AND event_kanwil=$kode_unit_kerja AND event_date_end >= curdate()");
						//$result=mysql_query('SELECT * FROM tb_pevita_peserta');
						
						while ($row=mysqli_fetch_array($result)){
							
							//$no 		= $id_jadwal;
							$nama_acara = $row["event_name"];
							
						echo '<a href="generate.php?q='.$key.'&id='.$id.'&nama_acara='.$nama_acara.'" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >'.$row[event_name].'</a>';
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
		<?php include 'inc/footermenu.php' ?>
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
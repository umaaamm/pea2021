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
include 'inc/db_con.php'; 
$id = $_REQUEST['id'];
$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
$nm_kantor =	dekripsi($_SESSION['nm_kanwil']);
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
					<span class="article-image preload-image" data-src-retina="images/pictures/millenniumhotel.jpg" data-src="images/pictures/millenniumhotel.jpg"></span>
					<span class="article-category color-white bg-green-dark uppercase">Venue</span>
					<?php 

							$result=mysql_query("SELECT * from tb_pevita_venue where event_kanwil = '$kode_unit_kerja' and event_id ='$id'");
							$row=mysql_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[11]</span>";
					?>
				</div>
			</div>
			
			<div class="content reading-time-box reading-words">
				<h4 class="small-bottom ultrabold">VENUE</h4>
				<?php 

					$result=mysql_query("SELECT * from tb_pevita_venue where event_kanwil = '$kode_unit_kerja' and event_id ='$id'");
					if(mysql_num_rows($result) > 0) {
						while ($row=mysql_fetch_row($result)){
							$nama_tempat =$row[12];
							$location = $row[14];
							$deskripsi = $row[13];
							$tgl_acara = $row[15];
							$waktu_acara = $row[16];
						
				?>
				<div class="news-list-item">
					<a href="#">
						<img class="preload-image" src="images/pictures/resto_cafe_sirih.jpg" data-src="images/pictures/resto_cafe_sirih.jpg" alt="img">
						<?php 
						echo "<strong style='text-align: left;''>$nama_tempat</strong>";
						
						?>
					</a>
					<span><?php echo $deskripsi ?></span>
					<span><i class="fa fa-map-marker font-10"></i><?php echo $location ?></span>
					<span><i class="fa fa-calendar font-10"></i><?php echo $tgl_acara ?></span>
					<span><i class="fa fa-clock-o font-13"></i><?php echo $waktu_acara ?></span>
				</div>
				<?php 
						}

						}
						else{
							echo "Untuk saat ini informasi mengenai venue belum tersedia";
						}
				?>
				<div class="news-list-item">
					<a href="#">
						<img class="preload-image" src="images/pictures/java_ballroom.jpg" data-src="images/pictures/java_ballroom.jpg" alt="img">
						<strong>RUANG Anggrek, Sumatera, dan Melati  </strong>
					</a>
					<span>Digunakan sebagai lokasi Coaching for Performance Rakernas PT PEGADAIAN (PERSERO) 2018.</span>
					<span><i class="fa fa-map-marker font-10"></i>Hotel Millennium</span>
					<span><i class="fa fa-calendar font-10"></i>10 Desember 2018</span>
					<span><i class="fa fa-clock-o font-13"></i>08.00 - 12.00 WIB</span>
				</div>
				<div class="news-list-item">
					<a href="#">
						<img class="preload-image" src="images/pictures/java_ballroom.jpg" data-src="images/pictures/java_ballroom.jpg" alt="img">
						<strong>Voyage Java Room</strong>
					</a>
					<span>Digunakan sebagai lokasi ISHOMA peserta Rakernas PT PEGADAIAN (PERSERO) 2018 .</span>
					<span><i class="fa fa-map-marker font-10"></i>Hotel Millennium</span>
					<span><i class="fa fa-calendar font-10"></i>10 - 12 Desember 2018</span>
					<span><i class="fa fa-clock-o font-13"></i>-</span>
				</div>
				<div class="news-list-item">
					<a href="#">
						<img class="preload-image" src="images/pictures/java_ballroom.jpg" data-src="images/pictures/java_ballroom.jpg" alt="img">
						<strong>Ruang Java Ballroom</strong>
					</a>
					<span>Digunakan sebagai lokasi acara utama Rakernas PT PEGADAIAN (PERSERO) 2018.</span>
					<span><i class="fa fa-map-marker font-10"></i>&nbsp;Hotel Millennium</span>
					<span><i class="fa fa-calendar font-10"></i>10 - 12 Desember 2018</span>
					<span><i class="fa fa-clock-o font-13"></i>-</span>
				</div>
					<div class="news-list-item">
					<a href="#">
						<img class="preload-image" src="images/pictures/djakarta_teather.jpg" data-src="images/pictures/djakarta_teather.jpg" alt="img">
						<strong>DJAKARTA TEATHER</strong>
					</a>
					<span>Digunakan sebagai lokasi acara Launching G-Values</span>
					<span><i class="fa fa-map-marker font-10"></i>&nbsp;Djakarta Teather</span>
					<span><i class="fa fa-calendar font-10"></i>12 Desember 2018</span>
					<span><i class="fa fa-clock-o font-13"></i>17.00 - 21.00</span>
				</div>					
				<br>
			<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			<br>
			<br>
			</div>
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
</div>
	
<?php include 'inc/footer.php'; ?>	
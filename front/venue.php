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
					<?php
						$result1=mysql_query("SELECT * from tb_pevita_banner where event_kanwil = '$kode_unit_kerja' and event_id ='$id' and kode_menu='05'");
						$row2=mysql_fetch_row($result1);
						echo "<span class='article-image preload-image' data-src-retina='images/pictures/$row2[6]' data-src='images/pictures/$row2[6]'></span>";
					?>
					
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
							$gambar = $row[7];
						
				?>
				<div class="news-list-item">
					<a href="#">
						<img class="preload-image" src="images/pictures/<?php echo $gambar ?>" data-src="images/pictures/<?php echo $gambar ?>" alt="img">
						<?php 
						echo "<strong style='text-align: left;'>$nama_tempat</strong>";
						
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
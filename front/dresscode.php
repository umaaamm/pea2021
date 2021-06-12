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
$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
include 'inc/db_con.php'; 
$id = $_REQUEST['id'];
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
					<span class="article-image preload-image" data-src-retina="images/pictures/banner-dresscode.png" data-src="images/pictures/banner-dresscode.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">DRESSCODE</span>
					<?php 
						$result=mysqli_query($koneksi, "SELECT * FROM pevita_event where event_id='$id'");
						$row=mysqli_fetch_row($result);
						echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
					
				</div>
			</div>
			
			<div class="content reading-time-box reading-words">
				<h4 class="small-bottom ultrabold">DRESSCODE</h4>
				<?php 

					$result=mysqli_query($koneksi, "SELECT * from tb_pevita_dresscode where event_kanwil = '$kode_unit_kerja' and event_id ='$id'");
					if(mysqli_num_rows($result) > 0) {
						while ($row=mysqli_fetch_row($result)){
							$tgl =$row[11];
							$waktu = $row[12];
							$tempat = $row[13];
							$male = $row[14];
							$female = $row[15];
							$gambar = $row[7];
						
				?>
				<div class="news-list-item">
					<a href="#">
					<?php 
						if ($gambar == null){
							echo "<img class='preload-image' src='images/pictures/casual.jpg' data-src='images/pictures/senin.jpg' alt='img'>";
						}
						else{
							echo "<img class='preload-image' src='images/pictures/$gambar' data-src='images/pictures/$gambar' alt='img'>";
						}
					?>
						
						<?php 
						echo "<strong style='text-align: left;''>$row[5]</strong>";
						
						?>
						
					</a>
					<span><i class="fa fa-calendar font-10"></i><?php echo $tgl ?></span>
					<span><i class="fa fa-clock-o font-13"></i><?php echo $waktu ?></span>
					<span><i class="fa fa-map-pin font-13"></i><?php echo $tempat ?></span>
					<span><i class="fa fa-male font-14"></i><?php echo $male ?></span>
					<span><i class="fa fa-female font-12"></i><?php echo $female ?></span>
				</div>
				<?php 
						}

						}
						else{
							echo "Untuk saat ini informasi mengenai dresscode belum tersedia";
						}
				?>
			<br>
			<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			<br>
			<br>
			</div>
			
		</div>  
		
	</div>
	<?php include 'inc/footermenu.php' ?>
</div>

<?php include 'inc/footer.php'; ?>	
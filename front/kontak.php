<?php 
include 'inc/ceksession.php';
include 'inc/header.php'; 
include 'inc/secretkey.php';
include 'inc/library.php';
include 'inc/db_con.php';

$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}

$id = $_REQUEST['id'];
$kode_kanwil = dekripsi($_SESSION['kode_unit_kerja']);
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
					<span class="article-image preload-image" data-src-retina="images/pictures/kontak.png" data-src="images/pictures/kontak.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Support</span>
						<?php 
							$result=mysql_query("SELECT * FROM pevita_event where event_id='$id'");
							$row=mysql_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
					<!--<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Tranformasi</span>-->
					<span class="article-author color-gray-light"></span>
				</div>
			</div>
			
			<div class="content reading-time-box reading-words">
				<!--<h4 class="small-bottom ultrabold">HUBUNGI KAMI</h4>-->

				<p>Jika membutuhkan bantuan, Bapak/ Ibu dapat meminta kami secara langsung untuk membantu atau menghubungi lewat nomor kontak yang ada di bawah ini. Kami siap membantu Anda. </p><br>

					<?php
						include 'inc/db_con.php'; 
						$result=mysql_query("SELECT * FROM tb_pevita_contact WHERE event_id='$id' AND event_kanwil='$kode_kanwil'");
						//$result=mysql_query('SELECT * FROM tb_pevita_peserta');
						if(mysql_num_rows($result) > 0) {
						while ($row=mysql_fetch_row($result)){
						echo "<div class='news-list-item'>";
						echo "<a href='#'>";
						echo "<img class='preload-image' src='images/pictures/kontaks.png' data-src='images/pictures/kontaks.png' alt='img'>";
						echo "<strong>$row[1]</strong>";
						echo "</a>";
						echo "<span><i class='fa fa-phone'></i><a href='tel:$row[2]'>$row[2]</a></span>";
						echo "<span>$row[6]</span>";
						echo "</div>";
						}
					}else{
						echo "<p><center>Maaf, kontak belum tersedia untuk event ini.</center></p>";
					}
					?>
								<br>
			
		<br>
					<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			</div>

		<br>
		<br>
		<br>
		</div> 
		
		<?php include 'inc/footermenu.php' ?>
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
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
include 'inc/db_con.php'; 
$nilai=$_GET['nilai'];
$nm_kantor =	dekripsi($_SESSION['nm_kanwil']);
$id = $_REQUEST['id'];
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
					<span class="article-image preload-image" data-src-retina="images/pictures/jadwal.png" data-src="images/pictures/jadwal.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Pengumuman</span>
						<?php 
							$result=mysql_query("SELECT * FROM pevita_event where event_id='$id'");
							$row=mysql_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
					<!--<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Tranformasi</span>-->
					<!--<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Tranformasi <?php echo $nm_kantor; ?></span>-->
					
					
				</div>
			</div>
			
			<div class="content reading-time-box reading-words">
				

				<?php
						
						$result=mysql_query("SELECT * FROM tm_pengumuman where tid=$nilai");
						$row=mysql_fetch_array($result);
						echo "<h6 class='small-bottom ultrabold' style='text-align: left !important; margin-bottom: 20px !important; line-height: 15px !important'>$row[5]</h6>";
						echo $row[6];
				?>

			<br>
			<br>
			<a href="pengumuman.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			<br>
			<br>
			</div>
		</div> 
<?php include 'inc/footermenu.php' ?>		
	</div>
</div>

<?php include 'inc/footer.php'; ?>	
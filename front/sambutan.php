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
						$result=mysql_query('SELECT * FROM tm_topik ORDER BY tid DESC LIMIT 1');
						$row=mysql_fetch_array($result);
						$nama = $row[5];
						$jabatan = $row[6];
						$gambar = $row[10];
						echo "<span class=\"article-image preload-image\" data-src-retina=\"../_banner/$gambar\" data-src=\"../_banner/$gambar\"></span>";
						echo "<span class='article-category color-white bg-green-dark uppercas'>$nama</span>";
						echo "<span class='article-author color-gray-dark'><i class='fa fa-user opacity-0'></i>$jabatan</span>";
					?>
				</div>
			</div>
			
			<div class="content reading-time-box reading-words">
				

				<?php
						
						$result=mysql_query('SELECT * FROM tm_topik ORDER BY tid DESC LIMIT 1');
						$row=mysql_fetch_array($result);
						$judul = $row[7];
						echo "<h4 class='small-bottom ultrabold'>$judul</h4>";
						echo $row[8];
				?>

			<br><br><br>
				<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			</div>
			<br>
			<br>
			<?php include 'inc/footermenu.php' ?>	
		</div>  
	</div>
</div>

<?php include 'inc/footer.php'; ?>	
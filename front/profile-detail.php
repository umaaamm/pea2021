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
$nilai=$_GET['nilai'];
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
					<?php
					$result=mysql_query("SELECT * FROM tm_profile where tid=$nilai");
					$row=mysql_fetch_array($result);					
					$gambar = $row[10];
					$nama = $row[5];
						echo "<span class=\"article-image preload-image\" data-src-retina=\"../portal/_foto/$gambar\" data-src=\"../portal/_foto/$gambar\"></span>";
						echo "<span class='article-category color-white bg-green-dark uppercas'>$nama</span>";
					?>
					<?php 
							$result=mysql_query("SELECT * FROM pevita_event where event_id='$id'");
							$row=mysql_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
							
					?>
					
					
				</div>
			</div>
			
			<div class="content reading-time-box reading-words">
				<h4 class="small-bottom ultrabold">Profile Pembicara</h4>

				<?php
						
						$result=mysql_query("SELECT * FROM tm_profile where tid=$nilai");
						$row=mysql_fetch_array($result);
						echo $row[7];
				?>

			

			<br>
			<a href="profile-pembicara.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			</div>
			<br><br>
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
</div>

<?php include 'inc/footer.php'; ?>	
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
					<span class="article-image preload-image" data-src-retina="images/pictures/slider-pea.jpg"data-src="images/pictures/slider-pea.jpg"></span>
					<span class="article-category color-white bg-green-dark uppercase">Seat</span>
					<?php 
						$result=mysql_query("SELECT * FROM pevita_event where event_id='$id'");
						$row=mysql_fetch_row($result);
						echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
					
				</div>
			</div>
			
			<div class="content reading-time-box reading-words">
				<h4 class="small-bottom ultrabold">Seat</h4>
				<?php 

					$result1=mysql_query("SELECT DISTINCT(table_number) FROM pea_2019_seat");
					if(mysql_num_rows($result1) > 0) {
						while ($row1=mysql_fetch_row($result1)){
							$seat =$row1[0];
						
				?>
				<div class="news-list-item">
						<table>
						<tr>
						<th colspan="2" style="padding-bottom: 5px; padding-top: 5px;"><h5>&nbsp;&nbsp;&nbsp;Meja&nbsp;<?php echo $seat?></h5></th>
						</tr>
						<tr>
						<th style="width: 20%; text-align: center;">Kursi</th>
						<th style="width: 50%; text-align: center;">Nama</th>
						</tr>
					<?php 
						$result2=mysql_query("SELECT seat_number, name FROM pea_2019_seat where table_number='$seat'");
						if(mysql_num_rows($result2) > 0) {
							while ($row2=mysql_fetch_row($result2)){
								$seat_number =$row2[0];
								$name =$row2[1];
							
					?>
					<tr>
					<td>
						<p style="display: block; font-size: 13px; line-height: 20px; font-weight: 600; color: #1f1f1f; text-align: center;"><?php echo $seat_number ?></p>
					</td>
					<td style="text-align: left;">
						<p style="margin-left: 10px; color: #004E44; font-weight: 420;"><?php echo $name ?></p>
					</td>
						<?php
						}
					}
						?>
						</table>
				</div>
				<?php 
						}

						}
						else{
							echo "Untuk saat ini informasi mengenai tempat duduk belum tersedia";
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
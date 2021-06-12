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
	$nm_kantor =	dekripsi($_SESSION['nm_kanwil']);
$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
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
					<span class="article-image preload-image" data-src-retina="images/pictures/pertanyaan.png" data-src="images/pictures/pertanyaan.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Pertanyaan</span>
					<?php 
							$result=mysqli_query($koneksi, "SELECT * FROM pevita_event where event_id='$id'");
							$row=mysqli_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
					<!--<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Tranformasi</span>-->
					<span class="article-author color-gray-light"></span>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<h4 class="small-bottom ultrabold">DAFTAR PERTANYAAN</h4>
				<p style="margin-bottom: 30px !important;">Pilih salah satu sesi/ materi untuk melihat pertanyaan yang Anda post sebelumnya.</p>
				<div class="content">
					<div class="container no-bottom">
						<div class="contact-form no-bottom">
							<form name='form' method='post' action='detail_pertanyaan.php?q=<?php echo $key; ?>&id=<?php echo $id;?>'>
								<div class="select-box select-box-2">
									<select name="sesi" id="sesi">
										<option value=6 selected>- Pilih Sesi Materi -</option>
										<?php
										$query = "SELECT a.id, a.kegiatan as event, a.schedule_begin FROM tb_pevita_jadwal a WHERE is_ask=1 and event_id=$id and event_kanwil=$kode_unit_kerja order by a.id ASC, a.schedule_begin ASC"; //choose the city from indonesia only
											$res = mysqli_query($koneksi, $query);
										while ($row = mysqli_fetch_array($res)){
											$id_jadwal = $row['id'];
											$event = $row['event'];
										  echo "<option value='$id_jadwal'>$event</option>";
										}
										?>
									</select>
								</div>	
								<input type="submit" name="submit" value="PILIH SESI" class="button-full button button-green uppercase ultrabold button-rounded" style="border-radius: 4px !important;">
								<input type="hidden" name="q" id="q" value="<?php echo KEY::SECRET_KEY; ?>" >
							</form>
							<a href="pertanyaan.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>" class="button-full button button-green uppercase ultrabold button-rounded" >KEMBALI</a>
						<br>
						</div>
					</div>
				</div>
			</div>
		</div> 
<?php include 'inc/footermenu.php' ?>		
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
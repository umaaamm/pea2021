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

$nm_kantor =	dekripsi($_SESSION['nm_kanwil']);
$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
	$id = $_REQUEST['id'];
?>	

<div id="page-transitions">
	<?php 
		include 'inc/sidebarmenu.php';
		
	?>				
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content" style="min-height:860px !important;">	
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
					<!--<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i>Townhall Tranformasi <?php echo $nm_kantor; ?></span>-->
					<span class="article-author color-gray-light"></span>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<!--<h4 class="small-bottom ultrabold">AJUKAN PERTANYAAN</h4>-->
				<p>Silakan isi form dibawah ini untuk mengajukan pertanyaan yang berkaitan dengan materi yang sedang dibahas. Tulis pertanyaan langsung pada pokok masalah/ bahasan dengan bahasa yang mudah dimengerti.</p>
			<div class="content" style="margin-top: 30px;">
				<div class="container no-bottom">
					<div class="contact-form no-bottom">
						<form action="sentpertanyaan.php?q=<?php echo $key; ?>&id=<?php echo $id;?>" method="POST" class="contactForm" id="contactForm">
							<!-- <fieldset>
								<div class="formFieldWrap">
									<label class="field-title contactSessionField" for="contactSessionField">Sesi Kegiatan (On Going):
									</label>
									<input type="text" name="sesi" value="<?php echo $sesi; ?>" class="contactField requiredField" readonly="readonly" id="sesi" />
								</div> -->						
								<div class="formFieldWrap">
									<label class="field-title contactSessionField" for="contactSessionField">Pilih Sesi Bertanya:
									</label>
									<div class="select-box select-box-2">
										<select name="sesi" id="sesi">
										<option value=6 selected>- Pilih Sesi Materi -</option>
										<?php

										$query = "SELECT a.id, a.kegiatan as event, a.schedule_begin FROM tb_pevita_jadwal a WHERE is_ask=1 and event_id=$id and event_kanwil=$kode_unit_kerja order by a.id ASC, a.schedule_begin ASC";
										$res = mysqli_query($koneksi, $query);
										$used_sel=false;
										while ($row=mysqli_fetch_array($res)) {
											$checked = "";
											$id_jadwal = $row['id'];
											$event = $row['event'];
											$sch_begin = $row['schedule_begin'];
											$sekarang = date("Y-m-d h:i:s");
											if (($sch_begin <= $sekarang) && (!$used_sel)) {
												$used_sel=true;
												//$checked="selected";
											}
											
											echo "<option value='$id_jadwal'>$event</option>";
										
										}
										
										?>
										</select>	
									</div>

								</div>
								<div class="formFieldWrap" style="margin-top: 20px;">
									<label class="field-title contactNameField" for="contactNameField">Pertanyaan Anda:
									</label>
									<div class="input-simple-2 textarea has-icon full-bottom"><i class="fa fa-edit"></i><textarea class="textarea-simple-2" placeholder="" name="tanya"id="tanya"></textarea></div>
								</div>
								

									<!--<input type="text" name="tanya" value="" class="contactField requiredField" id="tanya" />-->
			
								<div class="clear">
								</div>
			
								<div class="formSubmitButtonErrorsWrap contactFormButton">
									<input type="submit" name="submit" value="KIRIM PERTANYAAN" class="button-full button button-green uppercase ultrabold button-rounded" style="border-radius: 4px !important;"/>
									<input type="hidden" name="q" id="q" value="<?php echo KEY::SECRET_KEY; ?>" >
								</div>
							</fieldset>
						</form>	
						<a href="daftar_pertanyaan.php?q=<?php echo KEY::SECRET_KEY;?>&id=<?php echo $id;?>" class="button-full button button-green uppercase ultrabold button-rounded">DAFTAR PERTANYAAN ANDA</a>
					
					<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class=" button button-green button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
					<br>
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
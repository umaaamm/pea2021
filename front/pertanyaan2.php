<?php 
include 'inc/ceksession.php';
include 'inc/header.php'; 
include 'inc/secretkey.php';
include 'inc/db_con.php';
include 'inc/library.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}
	
$query="SELECT * FROM tb_pevita_jadwal WHERE schedule_begin <= NOW() ORDER BY schedule_begin ASC LIMIT 1";
$result = mysql_query($query);

while ($row=mysql_fetch_array($result)) {
	$skedul = $row['schedule_begin'];
	$kegiatan = $row['kegiatan'];
}
$sesi= $skedul . " | " . $kegiatan;
$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
	$id = $_REQUEST['id'];

?>	

<div id="page-transitions">
	<?php include 'inc/top_nav.php'; ?>				
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content">	
		<div id="page-content-scroll"><!--Enables this element to be scrolled -->
			
			<div class="article-card article-full full-bottom">
				<div class="article-header">
					<span class="article-overlay"></span>
					<span class="article-image preload-image" data-src-retina="images/pictures/pertanyaan.png" data-src="images/pictures/pertanyaan.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Pertanyaan</span>
					<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i>Rakornas PT Pegadaian (Persero) Tahun 2018</span>
					<span class="article-author color-gray-light"></span>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<h4 class="small-bottom ultrabold">AJUKAN PERTANYAAN</h4>
				<p>Silakan isi form dibawah ini untuk mengajukan pertanyaan yang berkaitan dengan materi yang sedang dibahas. Tulis pertanyaan langsung pada pokok masalah/ bahasan dengan bahasa yang mudah dimengerti.</p>
			<div class="content" style="margin-top: 20px;">
				<div class="container no-bottom">
					<div class="contact-form no-bottom">
			<!--			<div class="formSuccessMessageWrap" id="formSuccessMessageWrap">
							<div class="notification-large notification-has-icon notification-green">
								<div class="notification-icon"><a href="pertanyaan.php?q=<?php echo KEY::SECRET_KEY;?>"><i class="fa fa-window-close notification-icon close-notification"></i></a></div>
								<h1 class="uppercase ultrabold">TERIMA KASIH. PERTANYAAN TELAH TERKIRIM.</h1>
								<a href="pertanyaan.php?q=<?php echo KEY::SECRET_KEY;?>" class="close-notification"><i class="fa fa-question"></i></a>
							</div>				
						</div> -->
						<form action="sentpertanyaan.php?q=<?php echo $key; ?>" method="POST" class="contactForm" id="contactForm">
							<!-- <fieldset>
								<div class="formFieldWrap">
									<label class="field-title contactSessionField" for="contactSessionField">Sesi Kegiatan (On Going):
									</label>
									<input type="text" name="sesi" value="<?php /* echo $sesi; */?>" class="contactField requiredField" readonly="readonly" id="sesi" />
								</div> -->
								
								<div class="formFieldWrap">
									<label class="field-title contactSessionField" for="contactSessionField">Pilih Sesi Bertanya:
									</label>
									<div class="select-box select-box-2">
										<select name="sesi" id="sesi">
										<?php
										//$event_id			=	$id;
				echo "id_jadwal : $id_jadwal";
											echo "event: $event";
											exit();
										$query = "SELECT a.id, a.kegiatan as event, a.schedule_begin FROM tb_pevita_jadwal a WHERE is_ask=1 AND event_id='$id' AND event_kanwil = '$kode_unit_kerja' order by a.id ASC, a.schedule_begin ASC";
										$res = mysql_query($query);
										$used_sel=false;
										while ($row=mysql_fetch_array($res)) {
											$checked = "";
											$id_jadwal = $row['id'];
											$event = $row['kegiatan'];
											$sch_begin = $row['schedule_begin'];
											$sekarang = date("Y-m-d h:i:s");
											
											if (($sch_begin <= $sekarang) && (!$used_sel)) {
												$used_sel=true;
												$checked="selected";
											}
											
											echo "<option value='$id' $checked>$event</option>";
										
										}
										
										?>
										</select>	
									</div>
									
								</div>
								
								
								<div class="formFieldWrap">
									<label class="field-title contactNameField" for="contactNameField">Nama:
									</label>
									<input type="text" name="nama" value="" class="contactField requiredField" id="nama" />
								</div>
								<div class="formFieldWrap">
									<label class="field-title contactPhoneField" for="contactPhoneField">Pertanyaan:
									</label>
									<!--<input type="text" name="tanya" value="" class="contactField requiredField" id="tanya" />-->
									<div class="input-simple-2 textarea has-icon full-bottom"><i class="fa fa-edit"></i><textarea class="textarea-simple-2" placeholder="" name="tanya"id="tanya"></textarea></div>
								<div class="clear">
								</div>
			
								<div class="formSubmitButtonErrorsWrap contactFormButton">
									<input type="submit" class="buttonWrap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton" id="contactSubmitButton" value="AJUKAN PERTANYAAN" data-formId="contactForm" />
									<input type="hidden" name="q" id="q" value="<?php echo KEY::SECRET_KEY; ?>" >
								</div>
							</fieldset>
						</form>		
						<a href="daftar_pertanyaan.php?q=<?php echo KEY::SECRET_KEY;?>" class="button-full button button-green uppercase ultrabold">DAFTAR PERTANYAAN</a>
					</div>
				</div>
			</div>
			</div>
		</div>  
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
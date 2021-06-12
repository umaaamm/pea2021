<?php 
include 'inc/header.php'; 
include 'inc/secretkey.php';
include 'inc/db_con.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}

$query="SELECT * FROM tb_pevita_jadwal WHERE schedule_begin <= NOW() ORDER BY schedule_begin DESC LIMIT 1";
$result = mysql_query($query);

while ($row=mysql_fetch_array($result)) {
	$skedul = $row['schedule_begin'];
	$kegiatan = $row['kegiatan'];
}
$sesi= $skedul . " | " . $kegiatan;

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
					<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i>Rakor Keuangan 2017</span>
					<span class="article-author color-gray-light"></span>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<h4 class="small-bottom ultrabold">AJUKAN PERTANYAAN</h4>
				<p>Silakan isi form dibawah ini untuk mengajukan pertanyaan yang berkaitan dengan materi yang sedang dibahas. Tulis pertanyaan langsung pada pokok masalah/ bahasan dengan bahasa yang mudah dimengerti.</p>
			<div class="content">
				<div class="container no-bottom">
					<div class="contact-form no-bottom">
						<div class="formSuccessMessageWrap" id="formSuccessMessageWrap">
							<div class="notification-large notification-has-icon notification-green">
								<div class="notification-icon"><a href="pertanyaan.php?q=pGd82371P3vIt4171204iL0v3M4riS54"><i class="fa fa-window-close notification-icon close-notification"></i></a></div>
								<h1 class="uppercase ultrabold">TERIMA KASIH. PERTANYAAN TELAH TERKIRIM.</h1>
								<a href="pertanyaan.php?q=pGd82371P3vIt4171204iL0v3M4riS54" class="close-notification"><i class="fa fa-question"></i></a>
							</div>				
						</div>
						<form action="sentpertanyaan.php" method="POST" class="contactForm" id="contactForm">
							<fieldset>
								<div class="formFieldWrap">
									<label class="field-title contactSessionField" for="contactSessionField">Sesi Kegiatan:
									</label>
									<input type="text" name="sesi" value="<?php echo $sesi; ?>" class="contactField requiredField" readonly="readonly" id="sesi" />
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
					</div>
					<div class="content">
						
						<?php
							$result=mysql_query("SELECT * FROM tb_pevita_qa WHERE display='KEU1'");
							//$result=mysql_query("SELECT * FROM tb_pevita_qa WHERE sesi='$sesi'");
							if ($result!=0){
								echo "<h5 class='small-bottom ultrabold'>DAFTAR PERTANYAAN</h5>";
								while ($row=mysql_fetch_row($result)){
									echo "<div class='news-list-item2'>";
									echo "<a href='#'>";
									echo "<strong>$row[1]</strong> bertanya:";
									echo "</a>";
									echo "<span><i class='fa fa-question-circle'></i>&nbsp;&nbsp;$row[2]</span>";
									echo "</div>";
								}
							}else{
								echo "<h5 class='small-bottom ultrabold'>BELUM ADA YANG BERTANYA</h5>";
							}


						?>
					</div>
				</div>
			</div>
			</div>
		</div>  
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
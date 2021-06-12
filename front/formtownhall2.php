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
	$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
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
					<span class="article-image preload-image" data-src-retina="images/pictures/pertanyaan.png" data-src="images/pictures/pertanyaan.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Data Input Rekening</span>
					<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i>Townhall Transformasi</span>
					<span class="article-author color-gray-light"></span>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<h4 class="small-bottom ultrabold">INPUT NO. REK. TABUNGAN EMAS</h4>
				<p>Silakan isi formulir rekening Tabungan Emas. Pastikan nomor rekening tabungan emas yang Anda masukkan sudah benar.</p>
			<div class="content" style="margin-top: 20px;">
				<div class="container no-bottom">
					<div class="contact-form no-bottom">
						<form action="simpanformtownhall.php?q=<?php echo $key; ?>&id=<?php echo $id;?>" method="POST" class="contactForm" id="contactForm">
							<!-- <fieldset>
								<div class="formFieldWrap">
									<label class="field-title contactSessionField" for="contactSessionField">Sesi Kegiatan (On Going):
									</label>
									<input type="text" name="sesi" value="<?php echo $sesi; ?>" class="contactField requiredField" readonly="readonly" id="sesi" />
								</div> -->						
								<div class="formFieldWrap">
									<label class="field-title contactNameField" for="contactNameField" >No. Rekening Tabungan Emas
									</label>
									<input type="text" name="norek" placeholder="00000" class="contactField requiredField" id="norek" />
								</div>
								<div class="formFieldWrap" style="margin-top: 20px;">
									<label class="field-title contactNameField" for="contactNameField">No. HP yang Teregistrasi dengan PDS 
									</label>
									<input type="text" name="hp" placeholder="Contoh: 081234567890" class="contactField requiredField" id="hp"  />
								</div>
								<div class="formFieldWrap" style="margin-top: 20px;">
									<label class="field-title contactNameField" for="contactNameField">No. Kredit Gadai Tabungan Emas (jika ada)
									</label>
									<input type="text" name="gte" placeholder="00000" class="contactField" id="gte" />
								</div>

									<!--<input type="text" name="tanya" value="" class="contactField requiredField" id="tanya" />-->
									<p class="smaller-text half-bottom" style="margin-top:2px;">Dengan menekan tombol KIRIM di bawah ini, Anda telah memastikan semua data yang diinput sudah benar.</span>  
									</p>
								<div class="clear">
								</div>
			
								<div class="formSubmitButtonErrorsWrap contactFormButton" >
									<input type="submit" name="submit" value="SIMPAN DATA" class="buttonWrap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton" style="border-radius: 4px !important;">
									<input type="hidden" name="q" id="q" value="<?php echo KEY::SECRET_KEY; ?>" >
								</div>
							</fieldset>
						</form>	
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
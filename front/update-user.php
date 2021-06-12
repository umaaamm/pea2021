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
					<span class="article-category color-white bg-green-dark uppercase"> </span>
					<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i></span>
					<span class="article-author color-gray-light"></span>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<!--<h4 class="small-bottom ultrabold">AJUKAN PERTANYAAN</h4>-->
				<p>Ubah Kata Sandi Anda melalui halaman ini:                                                                                            </p>
			<div class="content" style="margin-top: 30px;">
				<div class="container no-bottom">
					<div class="contact-form no-bottom">
						<form action="inc/update-user.php?q=<?php echo $key; ?>&id=<?php echo $id;?>" method="POST" class="contactForm" id="contactForm">
								<div class="formFieldWrap" style="margin-top: 20px;">
									<label class="field-title contactNameField" for="contactNameField">Kata Sandi Lama
									</label>
									<div class="input-simple-2 has-icon full-bottom"><i class="fa fa-edit"></i><input type='password' name='katasandilama' class='contactField requiredField' id='katasandilama' required /></div>
								</div>					
								<div class="formFieldWrap" style="margin-top: 20px;">
									<label class="field-title contactNameField" for="contactNameField">Kata Sandi Baru
									</label>
									<div class="input-simple-2 has-icon full-bottom"><i class="fa fa-edit"></i><input type='password' name='katasandibaru' class='contactField requiredField' id='katasandibaru' required /></div>
								</div>	
								<div class="formFieldWrap" style="margin-top: 20px;">
									<label class="field-title contactNameField" for="contactNameField">Ulangi Kata Sandi Baru
									</label>
									<div class="input-simple-2 has-icon full-bottom"><i class="fa fa-edit"></i><input type='password' name='ulangkatasandi' class='contactField requiredField' id='ulangkatasandi' required /></div>
								</div>	
								<div class="clear">
								</div>
			
								<div class="formSubmitButtonErrorsWrap contactFormButton">
									<input type="submit" name="submit" value="UPDATE KATA SANDI" class="button-full button button-green uppercase ultrabold"/>
									<input type="hidden" name="key" id="key" value="<?php echo KEY::SECRET_KEY; ?>" >
									
								</div>
							</fieldset>
						</form>	
					</div>
				</div>
			</div>
			<br/>
			<br/>
			</div>
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
<?php 
include 'inc/header.php'; 
include 'inc/secretkey.php';
//$key = $_GET['q'];
//if ($key!=KEY::SECRET_KEY) {
//	echo KEY::MESSAGE;
//	exit;
//}

$nama = $_POST['nama'];
$hp = $_POST['hp'];
$paket = $_POST['paket'];



?>	

<div id="page-transitions">
	<?php include 'inc/top_nav.php'; ?>		
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content close-menu">	
		<div id="page-content-scroll"><!--Enables this element to be scrolled -->
			<div class="article-card article-full full-bottom">
				<div class="article-header">
					<span class="article-overlay"></span>
					<span class="article-image preload-image" data-src-retina="images/pictures/princess.jpg" data-src="images/pictures/princess.jpg"></span>
					<span class="article-category color-white bg-green-dark uppercase">Oleh-oleh</span>
					<span class="article-author color-gray-light"><i class="fa fa-shopping-basket opacity-50"></i>Rakernas 2017-2018</span>
				</div>
			</div>
			<div class="content3 reading-time-box reading-words">
				<p>Silakan isi form dibawah ini untuk melakukan pemesanan paket Oleh-oleh dari kota Bogor. Pembayaran dapat dilakukan pada saat pengambilan paket.</p>
			</div>
			<div class="content">
							<div class="news-list-item">
					<a href="#">
						<img class="preload-image" src="images/pictures/princess.jpg" data-src="images/pictures/princess.jpg" alt="img">
						<strong>Princess Cake</strong>
					</a>
					<span><i class="fa fa-money"></i>Rp. 220.000,-</span>
				</div>
				<div class="news-list-item">
					<a href="#">
						<img class="preload-image" src="images/pictures/raincake.jpg" data-src="images/pictures/raincake.jpg" alt="img">
						<strong>Rainbow Cake</strong>
					</a>
					<span><i class="fa fa-money"></i>Rp. 150.000,-</span>
				</div>	
				<div class="news-list-item">
					<a href="#">
						<img class="preload-image" src="images/pictures/paket3.jpg" data-src="images/pictures/paket3.jpg" alt="img">
						<strong>Princess + Rainbow Cake</strong>
					</a>
					<span><i class="fa fa-money"></i>Rp. 370.000,-</span>
				</div>
				<div class="container no-bottom">
					<div class="contact-form no-bottom">
						<div class="formSuccessMessageWrap" id="formSuccessMessageWrap">
							<div class="notification-large notification-has-icon notification-green">
								<div class="notification-icon"><a href="shop.php?q=pGdP82371P3vIt4171204iL0v3X14nLi"><i class="fa fa-window-close notification-icon close-notification"></i></a></div>
								<h1 class="uppercase ultrabold">TERIMA KASIH. PESANAN ANDA SUDAH KAMI TERIMA</h1>
								<a href="shop.php?q=pGdP82371P3vIt4171204iL0v3X14nLi" class="close-notification"><i class="fa fa-shopping-basket"></i></a>
							</div>				
						</div>
						<form  action="sentshop.php" method="POST" class="contactForm" id="contactForm">
							<fieldset>
								<div class="formFieldWrap">
									<label class="field-title contactNameField" for="contactNameField">Nama:</label>
									<input type="text" name="nama" id="nama" value="" class="contactField requiredField" id="nama" />
								</div>
								<div class="formFieldWrap">
									<label class="field-title contactPhoneField" for="contactPhoneField">Kontak HP:
									</label>
									<input type="text" name="hp" id="hp" value="" class="contactField requiredField" id="hp" />
								</div>
								<div class="formTextareaWrap">
									<label class="field-title contactOption" for="contactOption">Paket Dipilih: 
									</label>
									<div class="store-product-select-box select-box select-box-2 half-bottom">
										<select id="paket" name="paket" id="paket">
											<option value="paket-1">Paket 1 - Princess Cake</option>
											<option value="paket-2">Paket 2 - Rainbow Cake</option>
											<option value="paket-3">Paket 3 - Princess + Rainbow Cake</option>
										</select>
									</div>
								</div>
								<div class="formSubmitButtonErrorsWrap contactFormButton">
									<input type="submit" class="buttonWrap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton" id="contactSubmitButton" value="Pesan Oleh-oleh" data-formId="contactForm" />
									<input type="hidden" name="q" id="q" value="<?php echo KEY::SECRET_KEY; ?>">
									<p class="small-text color-red-dark half-bottom">Pemesanan diterima paling lambat hari Kamis 7 Desember 2017, pukul 12.00 WIB</p>
								</div>
							</fieldset>
						</form>			
					</div>
				</div>
			</div>	
		</div>  
	</div>
	
</div>
	
<?php include 'inc/footer.php'; ?>	
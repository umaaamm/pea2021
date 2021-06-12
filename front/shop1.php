<?php 
//include 'inc/header.php'; 
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
<html>
<head></head>
<body>	


						<form  action="sentshop.php" method="POST"  id="contactForm">
							<fieldset>
								<div >
									<label  for="contactNameField">Nama:<span>(wajib diisi)</span>
									</label>
									<input type="text" name="nama" id="nama" value=""  />
								</div>
								<div >
									<label  for="contactPhoneField">Kontak HP:<span>(wajb diisi)</span>
									</label>
									<input type="text" name="hp" id="hp" value="" />
								</div>
								<div >
									<label  for="contactOption">Paket Dipilih: <span>(required)</span>
									</label>
									<div >
										<select id="paket" name="paket" >
											<option value="paket-1">Paket 1 - Princess Cake</option>
											<option value="paket-2">Paket 2 - Rainbow Cake</option>
											<option value="paket-3">Paket 3 - Princess + Rainbow Cake</option>
										</select>
									</div>
								</div>
								<div >
									<input type="submit"  id="contactSubmitButton" value="Pesan Oleh-oleh"  />
									<input type="hidden" name="q" id="q" value="<?php echo KEY::SECRET_KEY; ?>">
								</div>
							</fieldset>
						</form>			

	
</body>
</html>	
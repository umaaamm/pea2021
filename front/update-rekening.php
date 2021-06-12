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
$nik = dekripsi($_SESSION['username'] );
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
					<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i>Townhall Transformasi</span>
					<span class="article-author color-gray-light"></span>
				</div>
			</div>

			<div class="content reading-time-box reading-words">
				<!--<h4 class="small-bottom ultrabold">AJUKAN PERTANYAAN</h4>-->
				<p style="color: #e02a2a;">PERHATIAN! Mengubah Rekening setelah melakukan absen (QR Code) berpotensi nomor rekening Anda tidak terupdate di sistem penyimpanan lokal Panitia. Hubungi Panitia Townhall untuk konfirmasi perubahan nomor rekening Anda.</p>
			<div class="content" style="margin-top: 30px;">
				<div class="container no-bottom">
					<div class="contact-form no-bottom">
						<form action="inc/update-rekening.php?q=<?php echo $key; ?>&id=<?php echo $id;?>" method="POST" class="contactForm" id="contactForm">
						<?php
								$result			= mysql_query("SELECT * FROM townhall WHERE nik='$nik' LIMIT 1");
								$row			= mysql_fetch_array($result);
								$norekte 		= $row[1];
								$nohp	 		= $row[2];
								$nogte	 		= $row[3];				
								//echo "TE: $norekte";
								echo "<div class='formFieldWrap' style='margin-top: 20px;'>";
								echo "<label class='field-title contactNameField' for='contactNameField'>No Rek. Tabungan Emas";
								echo "</label>";
								echo "<div class='input-simple-2 has-icon full-bottom'><i class='fa fa-edit'></i><input type='text' name='rekte' class='contactField requiredField' id='rekte' value='$row[1]' readonly style='background:#dedede;'/></div>";
								echo "</div>	";
								echo "<div class='formFieldWrap' style='margin-top: 20px;'>";
								echo "<label class='field-title contactNameField' for='contactNameField'>Koreksi No. Rek. Tabungan Emas";
								echo "</label>";
								echo "<div class='input-simple-2 has-icon full-bottom'><i class='fa fa-edit'></i><input type='text' name='korrekte' class='contactField requiredField' id='korrekte'  /></div>";
								echo "</div>	";
								echo "<div class='formFieldWrap' style='margin-top: 20px;'>";
								echo "<label class='field-title contactNameField' for='contactNameField'>No. Kredit Gadai Tab. Emas";
								echo "</label>";
								echo "<div class='input-simple-2 has-icon full-bottom'><i class='fa fa-edit'></i><input type='text' name='rekgte' class='contactField requiredField' id='rekgte' value='$row[3]' readonly style='background:#dedede;'/></div>";
								echo "</div>	";
								echo "<div class='formFieldWrap' style='margin-top: 20px;'>";
								echo "<label class='field-title contactNameField' for='contactNameField'>Koreksi No. Kredit Gadai Tab. Emas";
								echo "</label>";
								echo "<div class='input-simple-2 has-icon full-bottom'><i class='fa fa-edit'></i><input type='text' name='korrekgte' class='contactField requiredField' id='korrekgte'/></div>";
								echo "</div>";

								echo "<div class='formFieldWrap' style='margin-top: 20px;'>";
								echo "<label class='field-title contactNameField' for='contactNameField'>No. HP Register PDS";
								echo "</label>";
								echo "<div class='input-simple-2 has-icon full-bottom'><i class='fa fa-edit'></i><input type='text' name='nohppds' class='contactField requiredField' id='nohppds' value='$row[2]' readonly style='background:#dedede;'/></div>";
								echo "</div>	";

								echo "<div class='formFieldWrap' style='margin-top: 20px;'>";
								echo "<label class='field-title contactNameField' for='contactNameField'>Koreksi No. HP Register PDS";
								echo "</label>";
								echo "<div class='input-simple-2 has-icon full-bottom'><i class='fa fa-edit'></i><input type='text' name='kornohppds' class='contactField requiredField' id='kornohppds'/></div>";
								echo "</div>	";

								echo "<div class='clear'>";
								echo "</div>";
			
								echo "<div class='formSubmitButtonErrorsWrap contactFormButton'>";
								echo "<input type='submit' name='submit' value='UPDATE NOMOR REKENING' class='button-full button button-green uppercase ultrabold'/>";
								echo "<input type='hidden' name='key' id='key' value='<?php echo KEY::SECRET_KEY; ?>' >";
								echo "</div><br><br><br>";
								echo "</fieldset>";
							?>
						</form>	
					</div>
				</div>
			</div>
			</div>
		</div>  
		<?php include 'inc/footermenu.php' ?>
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
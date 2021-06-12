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
include 'inc/db_con.php'; 
$kode_unit_kerja	= dekripsi($_SESSION['kode_unit_kerja']);
$id 		= $_REQUEST['id'];
$nik		= dekripsi($_SESSION['username']); 
$nama 		= dekripsi($_SESSION['nama']);
$nm_kanwil 	= dekripsi($_SESSION['nm_kanwil']);
$nm_cabang 	= dekripsi($_SESSION['nm_cabang']);
//$nm_kantor 	= dekripsi($_SESSION['nm_kantor']);

?>	
<style>
 p {
	 margin-bottom: 3px !important;
	 line-height: 15px !important;
 }
 
 h5 {
	 margin-top:2px !important;
	 line-height: 15px !important;
 }
</style>
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
					<span class="article-image preload-image" data-src-retina="images/pictures/materi.png" data-src="images/pictures/materi.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Profile <?php echo $nama ?></span>
					<?php 
							$result=mysqli_query($koneksi, "SELECT * FROM pevita_event where event_id='$id'");
							$row=mysqli_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
					<!--<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Tranformasi <?php echo $nm_kantor; ?></span>-->
				</div>
			</div>
			
			<div class="content" style="margin: 0px 20px 20px 20px !important;">
			<?php
				$result=mysqli_query($koneksi, "SELECT * FROM tb_pevita_user where nik_pegawai='$nik' LIMIT 1");
				while ($row=mysqli_fetch_array($result)){
							
							//$norek = $row["norektabungan"];
							$hp = $row["hp"];
							$unit = $row["unit"];
							//$gte_id = $row["gte_id"];
							
						}
								echo "<div class='formFieldWrap'>";
								echo "<label class='field-title contactNameField' for='contactNameField'>NIK Pengguna";
								echo "</label>";
								echo "<input type='text' name='nik' value='$nik' class='contactField requiredField' id='nik' readonly />";
								echo "</div>";
								echo "<div class='formFieldWrap' style='margin-top:15px;'>";
								echo "<label class='field-title contactNameField' for='contactNameField'>Unit Kerja";
								echo "</label>";
								echo "<input type='text' name='norek' value= '$nm_kanwil - $unit' class='contactField requiredField' id='norek' readonly />";
								echo "</div>";
								echo "<div class='formFieldWrap' style='margin-top:15px;'>";
								echo "<label class='field-title contactNameField' for='contactNameField'>No. Handphone";
								echo "</label>";
								echo "<input type='text' name='hp' value= '$hp' class='contactField requiredField' id='hp' readonly />";
								echo "</div>";

										if ($id >=26 && $id <= 45) {
											$result=mysqli_query($koneksi, "SELECT a.norektabungan, a.hp, a.gte_id, b.unit FROM townhall a, tb_pevita_user b where a.nik=b.nik_pegawai AND a.event_kanwil='$kode_unit_kerja' AND a.event_id='$id' AND a.nik='$nik' LIMIT 1");
											$row=mysqli_fetch_array($result);
											echo "<div class='formFieldWrap'>";
											echo "<label class='field-title contactNameField' for='contactNameField'>No Rekening Tabungan Emas";
											echo "</label>";
											echo "<input type='text' name='norek' value= '$row[norektabungan]' class='contactField requiredField' id='norek' readonly />";
											echo "</div>";
										    echo "<div class='formFieldWrap' style='margin-top: 20px;'>";
											echo "<label class='field-title contactNameField' for='contactNameField'>No Handphone yang Sudah Teregistrasi dengan PDS"; 
											echo "</label>";
											echo "<input type='text' name='hp' value= '$row[hp]' class='contactField requiredField' id='hp' readonly  />";
											echo "</div>";
										    echo "<div class='formFieldWrap' style='margin-top: 20px;'>";
											echo "<label class='field-title contactNameField' for='contactNameField'>No ID GTE"; 
											echo "</label>";
											echo "<input type='text' name='gte_id' value= '$row[gte_id]' class='contactField requiredField' id='gte_id' readonly  />";
											echo '<br><a href="update-rekening.php?q='.$key.'" class="button-full button button-green uppercase ultrabold">UPDATE REKENING</a>';
											echo "</div>";
										} 
											?>
											<br>
											<br>
											<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class=" button button-green button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			<br>
			</div>	
			<br><br><br>	
		</div> 
<?php include 'inc/footermenu.php' ?>		
	</div>
</div>
	
<?php include 'inc/footer.php'; ?>	
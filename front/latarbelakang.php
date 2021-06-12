<?php 
include 'inc/header.php'; 
include 'inc/secretkey.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}
?>	

<div id="page-transitions">
	<?php include 'inc/top_nav.php'; ?>				
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content">	
		<div id="page-content-scroll"><!--Enables this element to be scrolled -->
			
			<div class="article-card article-full full-bottom">
				<div class="article-header">
					<span class="article-overlay"></span>
					<span class="article-image preload-image" data-src-retina="images/pictures/latar-belakang.png" data-src="images/pictures/latar-belakang.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Latar Belakang</span>
					<span class="article-author color-gray-dark"><i class="fa fa-book opacity-0"></i>Rakernas 2017-2018</span>
				</div>
			</div>
			
			<div class="content reading-time-box reading-words">
				<h5 class="small-bottom ultrabold">LATAR BELAKANG</h5>
<p>Secara umum, dinamika lingkungan bisnis saat ini dan ke depan adalah persaingan bisnis, perkembangan era digital, perkembangan <i>customer experience</i>, tuntutan <i>service excellence</i>, penyesuaian kompetensi perusahaan, perubahan regulasi pemerintah, dan fokus bisnis perusahaan.</p>
				<p>Dalam rangka menghadapi tantangan bisnis di atas, manajemen merumuskan <i>role plan</i> Rencana Jangka Panjang Perusahaan (RJPP) 2019-2023. Tiga pilar utama yang dibangun dalam RJPP 2019-2023 tersebut meliputi: pertama; Transformasi Bisnis, kedua; Transformasi Teknologi Informasi dan Kesisteman, dan ketiga; Transformasi SDM dan Budaya Perusahaan.</p>
				<p>Peserta Rakernas yang saya hormati, <br>
Rencana perusahaan <i>(Corporate Plan)</i> yang tercermin dalam RJPP dan RKAP tersebut tidak akan bermakna jika tidak diikuti oleh disiplin eksekusi yang cepat dan akurat. Momen Rakernas ini harus mampu menjadi media untuk menyamakan persepsi sehingga dapat meminimalisir deviasi dalam implementasi rencana dan kebijakan perusahaan di lapangan.</p>
				<p>Oleh karena itu dalam rangka menyamakan persepsi seluruh Insan Pegadaian, maka setelah Rakernas ini, kami minta agar seluruh peserta untuk melakukan internalisasi dan cascading kepada seluruh Insan Pegadaian di unit kerja masing-masing. Hal ini dimaksudkan agar Insan Pegadaian di seluruh unit kerja memahami dengan baik arah dan target perusahaan ke depan serta mempunyai komitmen yang sama dalam mewujudkannya.</p>
			</div>
		</div>  
	</div>
</div>
	
<?php include 'inc/footer.php'; ?>	
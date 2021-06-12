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
					<span class="article-image preload-image" data-src-retina="images/pictures/materi.png" data-src="images/pictures/materi.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">DOWNLOAD MATERI</span>
					<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Rakernas 2017-2018</span>
				</div>
			</div>
			
			<div class="content">
				<p class="half-bottom">
					Download Juknis dan Materi Rakernas Pegadaian disini!
				</p>
			</div>
			
			
			<div class="content">
				<div class="decoration no-bottom"></div>
				<ul class="link-list">
					<li><a data-deploy-menu="1" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Juknis Pegadaian Digital Service<i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="2" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Juknis Agen Pegadaian<i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="3" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Materi Digital Disruption - Kaspar Situmorang<i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="4" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Materi Makro Outlook - Dr Lana Soelistyoningsih<i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="5" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Materi Presentasi Dirut<i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="6" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Materi Presentasi Dir. Keu &amp; TI<i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="7" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Materi Presentasi Dir. Produk <i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="8" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Materi Presentasi Dir. Operasi &amp; Pemasaran <i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="9" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Materi Presentasi Dir. SDM &amp; Hukum <i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="10" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Materi Presentasi Dir. Manajemen Aset <i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="11" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Materi Presentasi KPK <i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="12" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Kelompok FGD Rakernas<i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="13" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>Demo Aplikasi TI<i class="fa fa-angle-right"></i></a></li>
					<li><a data-deploy-menu="14" href="#"><i class="fa fa-cloud-download font-16 color-green-light"></i>CEO Remarks<i class="fa fa-angle-right"></i></a></li>					
				</ul>
			</div>		
		</div>  
	</div>

			<div id="1" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="http://www.pegadaian.co.id/download/rakernas/User_Guide_Android_App.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">User Guide Aplikasi PDS</a>
					<a href="http://www.pegadaian.co.id/download/rakernas/User_Manual_Admin_Cabang.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">User Guide Admin Cabang</a>
					<a href="http://www.pegadaian.co.id/download/rakernas/User_Manual_Front_Web.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">User Guide Nasabah (Web)</a>
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>	
			<div id="2" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="http://www.pegadaian.co.id/download/rakernas/Manual_Book_Agen_Pegadaian(Web)_v.1.0.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">User Guide Website AP </a>
					<a href="http://www.pegadaian.co.id/download/rakernas/Manual_Book_Agen_Pegadaian_(Mobile Sistem)_v.1.0.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">User Guide Aplikasi AP</a>
					<a href="http://www.pegadaian.co.id/download/rakernas/JUKNIS_-_AGEN_PEGADAIAN_PASSION_v.1.0.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">User Guide AP Passion</a>
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>
			<div id="3" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/Digital_Disruption_Pegadaian.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Materi Digital Disruption - Kaspar Situmorang</a>
					
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>	
			<div id="4" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/SAM_House_View_Ekonomi_2018_Desember_2017.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Materi Digital Disruption - Kaspar Situmorang</a>
					
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>
			<div id="5" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/Presentasi_From_Good_To_Great_Presentasi_Dirut_Rakernas_Desember_2017.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Materi Presentasi Dirut</a>
					
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>
			<div id="6" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/Direktorat_Keuangan_dan_TI_v02.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Materi Presentasi Dir. Keu &amp; TI</a>
					
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>	
			<div id="7" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/Materi_Dir_Produk.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Materi Presentasi Dir. Keu &amp; TI</a>
					
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>	
			<div id="8" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/Materi_Presentasi_Direktur_OPP_Rakernas_2018_ Bogor_.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Materi Presentasi Dir. Operasi &amp; Pemasaran</a>
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>
			<div id="9" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/Materi_Dir_SDM_Hukum.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Materi Presentasi Dir. SDM &amp; Hukum</a>
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>
			<div id="10" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/Presentasi_Dir_ManajemenAset.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Materi Presentasi Dir. Manajemen Aset</a>
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>
			<div id="11" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/Bimtek_e-Filing_-_PN.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Materi Presentasi KPK</a>
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>
			<div id="12" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/FGD_Rakernas.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Pembagian Kelompok FGD</a>
					<em class="ultrasmall-text center-text color-gray-dark half-top"></em>
				</div>
			</div>
			<div id="13" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/DemoAplikasiTI.zip" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">Materi Demo Aplikasi - IT</a>
					<em class="ultrasmall-text center-text color-gray-dark half-top">PERHATIAN. File download berekstensi *.zip. Anda harus membuka file tersebut di PC/ laptop, atau setidaknya telah menginstall ekstraktor pada ponsel/ HP/ gadget Anda.</em>
				</div>
			</div>
			<div id="14" data-menu-size="280" class="menu-wrapper menu-light menu-bottom">
				<div class="content">
					<h5 class="color-black center-text uppercase ultrabold full-top half-bottom"></h5>
					<a href="../download/rakernas/CEO_Remarks_2018.pdf" target="_blank" class="dummy-button button button-rounded button-green button-green-3d button-s uppercase ultrabold button-center-large">CEO Remarks</a>
				</div>
			</div>			
</div>
	
<?php include 'inc/footer.php'; ?>	
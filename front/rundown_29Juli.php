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
	$id = $_REQUEST['id'];
	$nm_kantor =	dekripsi($_SESSION['nm_kanwil']);
	$kode_unit_kerja = dekripsi($_SESSION['kode_unit_kerja']);
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
		<div class="article-card article-full no-bottom">
			<div class="article-header">
					<!-- <span class="article-overlay"></span> -->
					
					<!-- <span class="article-image preload-image" data-src-retina="images/pictures/slider-pea.jpg" data-src="images/pictures/slider-pea.jpg"></span>-->
					<span class="article-image preload-image" data-src-retina="images/pictures/jadwal.png" data-src="images/pictures/jadwal.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Jadwal Kegiatan</span>
					<?php 
							$result=mysqli_query($koneksi, "SELECT * FROM pevita_event where event_id='$id'");
							$row=mysqli_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
					<!--<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-blue-dark font-20"></i><em>Hari 1</em></a>
				<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-red-dark font-20"></i><em>Hari 2</em></a>-->
			<!--	<a href="#" data-deploy-menu="hari-3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a> -->
				<div class="decoration"></div>
			</div>



		<!--<div class="article-card article-full no-bottom">
				<div class="article-header">
					<div>
						<video width="100%" >
							<source src="../portal/_video/rakernas2018.mp4" type="video/mp4">
						</video>
					</div>

				</div>
			</div>
		</div>-->
		<div class="store-categories-small">
			<?php if($id==63){
				echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				echo'<a href="#" data-deploy-menu="hari-3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>';
				echo'<a href="#" data-deploy-menu="hari-4"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 4</em></a>';
				echo'<a href="#" data-deploy-menu="hari-5"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 5</em></a>';
				echo'<a href="#" data-deploy-menu="hari-6"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 6</em></a>';
				}elseif($id==64){
					echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				}
				elseif($id == 74){
					echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-b1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-b2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				echo'<a href="#" data-deploy-menu="hari-b3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>';
				echo'<a href="#" data-deploy-menu="hari-b4"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 4</em></a>';
				}
				elseif($id==66){
					echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				}elseif($id==67){
					echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				echo'<a href="#" data-deploy-menu="hari-3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>';
				}
				elseif($id==68){
					echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-x"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-x1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				echo'<a href="#" data-deploy-menu="hari-x2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>';
				echo'<a href="#" data-deploy-menu="hari-x3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 4</em></a>';
				echo'<a href="#" data-deploy-menu="hari-x4"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 5</em></a>';
				}elseif($id==69){
					echo '<br>';
					echo'<a href="#" data-deploy-menu="hari-a1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
					echo'<a href="#" data-deploy-menu="hari-a2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
					echo'<a href="#" data-deploy-menu="hari-a3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>';
				}elseif($id==71){
				echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				echo'<a href="#" data-deploy-menu="hari-3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>';
				}elseif($id==72){
				echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-b1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-b2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				echo'<a href="#" data-deploy-menu="hari-b3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>';
				echo'<a href="#" data-deploy-menu="hari-b4"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 4</em></a>';
				}elseif($id==73){
				echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				echo'<a href="#" data-deploy-menu="hari-3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>';
				echo'<a href="#" data-deploy-menu="hari-4"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 4</em></a>';
				}elseif($id==96){
				echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-m1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-m2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				echo'<a href="#" data-deploy-menu="hari-m3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>';
				}elseif($id==92){
				echo '<br>';
				echo'<a href="#" data-deploy-menu="hari-r1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-r2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				}
				else{
					echo'<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-blue-dark font-20"></i><em>Hari 1</em></a>';
					
				} ?>
				<!--<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-blue-dark font-20"></i><em>Hari 1</em></a>
				<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-red-dark font-20"></i><em>Hari 2</em></a>-->
			<!--	<a href="#" data-deploy-menu="hari-3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a> -->
				<div class="decoration"></div>
			<!-- Menu Modal -->
		</div>
		<div class="content">
					<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
				<br>
				<br>
		</div>
	</div>
			</div>
			<?php include 'inc/footermenu.php' ?>

		
		<?php
							if($id==63){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='2' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-1" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==66){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='7' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-1" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL PALEMBANG</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Palembang</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==67){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='7' order by id ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-1" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL MAKASSAR</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Makassar - 1</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==71){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='9' order by id ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-1" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL SEMARANG</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Semarang - 1</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==73){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='13' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-1" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL JAKARTAx</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Jakarta I - 1</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==96){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='15' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-m1" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}else{
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='24' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-1" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'><h5>$row[4]</h5></strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</br>';
								echo '</div>';
							}
	
							?>	
								<!--Hari ke-2-->
			<?php
			if($id==63){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='3' order by schedule_begin ASC");
			$row=mysql_fetch_row($result);
			echo '<div id="hari-2" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==66){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='8' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-2" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL PALEMBANG</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Palembang</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</br>';
								echo '</div>';
							
							}elseif($id==67){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='8' order by id ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-2" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL MAKASSAR</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Makassar - 2</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</br>';
								echo '</div>';
							
							}elseif($id==71){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='10' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-2" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL SEMARANG</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Semarang - 2</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==73){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='14' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-2" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL JAKARTA I</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Jakarta I - 2</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==96){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='16' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-m2" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}else{
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='7' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-2" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</br>';
								echo '</div>';
							}
						?>	 
						<!--Hari ke-3-->
			<?php
			if($id==63){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='4' order by schedule_begin ASC");
			$row=mysql_fetch_row($result);
			echo '<div id="hari-3" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==67){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='9' order by id ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-3" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL MAKASSAR</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Makassar - 3</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</br>';
								echo '</div>';
							
							}elseif($id==71){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='11' order by id ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-3" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL SEMARANG</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Semarang - 3</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==73){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='15' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-3" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL JAKARTA</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Jakarta I - 3</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}elseif($id==96){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='17' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-m3" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}else{
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='7' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-2" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</br>';
								echo '</div>';
							}
						?>

						<!-- Hari ke-4 -->

						<?php
			if($id==63){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='5' order by schedule_begin ASC");
			$row=mysql_fetch_row($result);
			echo '<div id="hari-4" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}else{
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='16' order by schedule_begin ASC");
							$row=mysql_fetch_row($result);
							echo '<div id="hari-4" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;RAKERWIL JAKARTA I</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>Rakerwil Jakarta I - 4</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";

								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}
						?>

						<!-- Hari Ke-5 -->
						<?php
			if($id==63){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='6' order by schedule_begin ASC");
			$row=mysql_fetch_row($result);
			echo '<div id="hari-5" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}
						?>
						<!-- Hari Ke-6 -->
						<?php
			if($id==63){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='7' order by schedule_begin ASC");
			$row=mysql_fetch_row($result);
			echo '<div id="hari-6" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}
						?>
						<?php
			if($id==64){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='3' order by schedule_begin ASC");
			$row=mysql_fetch_row($result);
			echo '<div id="hari-1" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}
						?>	 
						<!--Hari ke-3-->

						<?php
			if($id==64){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='4' order by schedule_begin ASC");
			$row=mysql_fetch_row($result);
			echo '<div id="hari-2" class="menu-wrapper menu-light menu-modal-full menu-large">';
							echo '<div class="menu-scroll">';
							echo '<div class="calendar-full content ">';
							echo '<div class="cal-footer">';
							echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
							echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
							echo" <span class='cal-message half-top'>";
							echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
							echo"<strong class='color-gray-dark'>$row[4]</strong>";
							echo"<strong class='color-gray-dark'>$row[8]</strong>";
							echo"</span>";
							echo"<div class='decoration half-top no-bottom'></div>";
										while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[7]</span>";
									echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
								//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
									echo "</div>";
								}
								echo '</div>';
								echo'<div class="bottom-rundown"></div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
							}

							if($id==65){
								$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='8' order by schedule_begin ASC");
								$row=mysql_fetch_row($result);
								echo '<div id="hari-1" class="menu-wrapper menu-light menu-modal-full menu-large">';
												echo '<div class="menu-scroll">';
												echo '<div class="calendar-full content ">';
												echo '<div class="cal-footer">';
												echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
												echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
												echo" <span class='cal-message half-top'>";
												echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
												echo"<strong class='color-gray-dark'>$row[4]</strong>";
												echo"<strong class='color-gray-dark'>$row[8]</strong>";
												echo"</span>";
												echo"<div class='decoration half-top no-bottom'></div>";
															while ($row=mysql_fetch_row($result)){
														echo "<div class='cal-schedule'>";
														echo "<em>$row[1]<br>$row[2]</em>";
														echo "<strong>$row[4]</strong>";
														echo "</a>";
														echo "<span><i class='fa fa-user'></i>$row[7]</span>";
														echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
													//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
														echo "</div>";
													}
													echo '</div>';
													echo'<div class="bottom-rundown"></div>';
													echo '</div>';
													echo '</div>';
													echo '</div>';
												}

												if($id==65){
													$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='7' order by schedule_begin ASC");
													$row=mysql_fetch_row($result);
													echo '<div id="hari-2" class="menu-wrapper menu-light menu-modal-full menu-large">';
																	echo '<div class="menu-scroll">';
																	echo '<div class="calendar-full content ">';
																	echo '<div class="cal-footer">';
																	echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
																	echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
																	echo" <span class='cal-message half-top'>";
																	echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
																	echo"<strong class='color-gray-dark'>$row[4]</strong>";
																	echo"<strong class='color-gray-dark'>$row[8]</strong>";
																	echo"</span>";
																	echo"<div class='decoration half-top no-bottom'></div>";
																				while ($row=mysql_fetch_row($result)){
																			echo "<div class='cal-schedule'>";
																			echo "<em>$row[1]<br>$row[2]</em>";
																			echo "<strong>$row[4]</strong>";
																			echo "</a>";
																			echo "<span><i class='fa fa-user'></i>$row[7]</span>";
																			echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
																		//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
																			echo "</div>";
																		}
																		echo '</div>';
																		echo'<div class="bottom-rundown"></div>';
																		echo '</div>';
																		echo '</div>';
																		echo '</div>';
																	}

																	if($id==65){
																		$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='8' order by schedule_begin ASC");
																		$row=mysql_fetch_row($result);
																		echo '<div id="hari-3" class="menu-wrapper menu-light menu-modal-full menu-large">';
																						echo '<div class="menu-scroll">';
																						echo '<div class="calendar-full content ">';
																						echo '<div class="cal-footer">';
																						echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
																						echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
																						echo" <span class='cal-message half-top'>";
																						echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
																						echo"<strong class='color-gray-dark'>$row[4]</strong>";
																						echo"<strong class='color-gray-dark'>$row[8]</strong>";
																						echo"</span>";
																						echo"<div class='decoration half-top no-bottom'></div>";
																									while ($row=mysql_fetch_row($result)){
																								echo "<div class='cal-schedule'>";
																								echo "<em>$row[1]<br>$row[2]</em>";
																								echo "<strong>$row[4]</strong>";
																								echo "</a>";
																								echo "<span><i class='fa fa-user'></i>$row[7]</span>";
																								echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
																							//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
																								echo "</div>";
																							}
																							echo '</div>';
																							echo'<div class="bottom-rundown"></div>';
																							echo '</div>';
																							echo '</div>';
																							echo '</div>';
																						}
																						if($id==65){
																							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='9' order by schedule_begin ASC");
																							$row=mysql_fetch_row($result);
																							echo '<div id="hari-4" class="menu-wrapper menu-light menu-modal-full menu-large">';
																											echo '<div class="menu-scroll">';
																											echo '<div class="calendar-full content ">';
																											echo '<div class="cal-footer">';
																											echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
																											echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
																											echo" <span class='cal-message half-top'>";
																											echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
																											echo"<strong class='color-gray-dark'>$row[4]</strong>";
																											echo"<strong class='color-gray-dark'>$row[8]</strong>";
																											echo"</span>";
																											echo"<div class='decoration half-top no-bottom'></div>";
																														while ($row=mysql_fetch_row($result)){
																													echo "<div class='cal-schedule'>";
																													echo "<em>$row[1]<br>$row[2]</em>";
																													echo "<strong>$row[4]</strong>";
																													echo "</a>";
																													echo "<span><i class='fa fa-user'></i>$row[7]</span>";
																													echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
																												//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
																													echo "</div>";
																												}
																												echo '</div>';
																												echo'<div class="bottom-rundown"></div>';
																												echo '</div>';
																												echo '</div>';
																												echo '</div>';
																											}
																											?>
<?php 
if($id==68){
	$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='9' order by schedule_begin ASC");
	$row=mysql_fetch_row($result);
	echo '<div id="hari-x" class="menu-wrapper menu-light menu-modal-full menu-large">';
					echo '<div class="menu-scroll">';
					echo '<div class="calendar-full content ">';
					echo '<div class="cal-footer">';
					echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
					echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
					echo" <span class='cal-message half-top'>";
					echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
					echo"<strong class='color-gray-dark'>$row[4]</strong>";
					echo"<strong class='color-gray-dark'>$row[8]</strong>";
					echo"</span>";
					echo"<div class='decoration half-top no-bottom'></div>";
								while ($row=mysql_fetch_row($result)){
							echo "<div class='cal-schedule'>";
							echo "<em>$row[1]<br>$row[2]</em>";
							echo "<strong>$row[4]</strong>";
							echo "</a>";
							echo "<span><i class='fa fa-user'></i>$row[7]</span>";
							echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
						//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
							echo "</div>";
						}
						echo '</div>';
						echo'<div class="bottom-rundown"></div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
?>
<?php 
if($id==68){
	$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='10' order by schedule_begin ASC");
	$row=mysql_fetch_row($result);
	echo '<div id="hari-x1" class="menu-wrapper menu-light menu-modal-full menu-large">';
					echo '<div class="menu-scroll">';
					echo '<div class="calendar-full content ">';
					echo '<div class="cal-footer">';
					echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
					echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
					echo" <span class='cal-message half-top'>";
					echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
					echo"<strong class='color-gray-dark'>$row[4]</strong>";
					echo"<strong class='color-gray-dark'>$row[8]</strong>";
					echo"</span>";
					echo"<div class='decoration half-top no-bottom'></div>";
								while ($row=mysql_fetch_row($result)){
							echo "<div class='cal-schedule'>";
							echo "<em>$row[1]<br>$row[2]</em>";
							echo "<strong>$row[4]</strong>";
							echo "</a>";
							echo "<span><i class='fa fa-user'></i>$row[7]</span>";
							echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
						//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
							echo "</div>";
						}
						echo '</div>';
						echo'<div class="bottom-rundown"></div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
?>																																			
<?php 
if($id==68){
	$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='11' order by schedule_begin ASC");
	$row=mysql_fetch_row($result);
	echo '<div id="hari-x2" class="menu-wrapper menu-light menu-modal-full menu-large">';
					echo '<div class="menu-scroll">';
					echo '<div class="calendar-full content ">';
					echo '<div class="cal-footer">';
					echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
					echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
					echo" <span class='cal-message half-top'>";
					echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
					echo"<strong class='color-gray-dark'>$row[4]</strong>";
					echo"<strong class='color-gray-dark'>$row[8]</strong>";
					echo"</span>";
					echo"<div class='decoration half-top no-bottom'></div>";
								while ($row=mysql_fetch_row($result)){
							echo "<div class='cal-schedule'>";
							echo "<em>$row[1]<br>$row[2]</em>";
							echo "<strong>$row[4]</strong>";
							echo "</a>";
							echo "<span><i class='fa fa-user'></i>$row[7]</span>";
							echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
						//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
							echo "</div>";
						}
						echo '</div>';
						echo'<div class="bottom-rundown"></div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
?>	
<?php 
if($id==68){
	$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='12' order by schedule_begin ASC");
	$row=mysql_fetch_row($result);
	echo '<div id="hari-x3" class="menu-wrapper menu-light menu-modal-full menu-large">';
					echo '<div class="menu-scroll">';
					echo '<div class="calendar-full content ">';
					echo '<div class="cal-footer">';
					echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
					echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
					echo" <span class='cal-message half-top'>";
					echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
					echo"<strong class='color-gray-dark'>$row[4]</strong>";
					echo"<strong class='color-gray-dark'>$row[8]</strong>";
					echo"</span>";
					echo"<div class='decoration half-top no-bottom'></div>";
								while ($row=mysql_fetch_row($result)){
							echo "<div class='cal-schedule'>";
							echo "<em>$row[1]<br>$row[2]</em>";
							echo "<strong>$row[4]</strong>";
							echo "</a>";
							echo "<span><i class='fa fa-user'></i>$row[7]</span>";
							echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
						//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
							echo "</div>";
						}
						echo '</div>';
						echo'<div class="bottom-rundown"></div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
?>	
<?php 
if($id==68){
	$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='13' order by schedule_begin ASC");
	$row=mysql_fetch_row($result);
	echo '<div id="hari-x4" class="menu-wrapper menu-light menu-modal-full menu-large">';
					echo '<div class="menu-scroll">';
					echo '<div class="calendar-full content ">';
					echo '<div class="cal-footer">';
					echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
					echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
					echo" <span class='cal-message half-top'>";
					echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
					echo"<strong class='color-gray-dark'>$row[4]</strong>";
					echo"<strong class='color-gray-dark'>$row[8]</strong>";
					echo"</span>";
					echo"<div class='decoration half-top no-bottom'></div>";
								while ($row=mysql_fetch_row($result)){
							echo "<div class='cal-schedule'>";
							echo "<em>$row[1]<br>$row[2]</em>";
							echo "<strong>$row[4]</strong>";
							echo "</a>";
							echo "<span><i class='fa fa-user'></i>$row[7]</span>";
							echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
						//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
							echo "</div>";
						}
						echo '</div>';
						echo'<div class="bottom-rundown"></div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
?>	
<?php
			if($id==69){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='10' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-a1" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
<?php
			if($id==69){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='11' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-a2" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
<?php
			if($id==69){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='12' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-a3" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
<?php
			if($id==72){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='13' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-b1" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
<?php
			if($id==72){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='14' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-b2" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
							<?php
			if($id==72){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='15' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-b3" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
							<?php
			if($id==72){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='16' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-b4" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
<?php
			if($id==74){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='15' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-b1" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
<?php
			if($id==74){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='16' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-b2" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
<?php
			if($id==74){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='17' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-b3" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
<?php
			if($id==74){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='18' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-b4" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
							<?php
			if($id==92){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='24' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-r1" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>
<?php
			if($id==92){
				$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='25' order by schedule_begin ASC");
				$row=mysql_fetch_row($result);
				echo '<div id="hari-r2" class="menu-wrapper menu-light menu-modal-full menu-large">';
								echo '<div class="menu-scroll">';
								echo '<div class="calendar-full content ">';
								echo '<div class="cal-footer">';
								echo '<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>';
								echo "<h5 class='cal-sub-title uppercase ultrabold bg-green-corp2 close-menu' style='padding-top:20px;'><i class='fa fa-arrow-left color-white font-16'></i>&nbsp;&nbsp;$row[4]</h5>";
								echo" <span class='cal-message half-top'>";
								echo"<i class='fa fa-map-marker font-18 color-red-dark'></i>";
								echo"<strong class='color-gray-dark'>$row[4]</strong>";
								echo"<strong class='color-gray-dark'>$row[8]</strong>";
								echo"</span>";
								echo"<div class='decoration half-top no-bottom'></div>";
											while ($row=mysql_fetch_row($result)){
										echo "<div class='cal-schedule'>";
										echo "<em>$row[1]<br>$row[2]</em>";
										echo "<strong>$row[4]</strong>";
										echo "</a>";
										echo "<span><i class='fa fa-user'></i>$row[7]</span>";
										echo "<span><i class='fa fa-microphone'></i>$row[6]</span>";
									//	echo "<span><i class='fa fa-map-marker'></i>$row[7]</span>";
										echo "</div>";
									}
									echo '</div>';
									echo'<div class="bottom-rundown"></div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							?>

<?php 
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
					<span class="article-overlay"></span>
					<span class="article-image preload-image" data-src-retina="images/pictures/jadwal.png" data-src="images/pictures/jadwal.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Jadwal Kegiatan</span>
					<?php 
							$result=mysql_query("SELECT * FROM pevita_event where event_id='$id'");
							$row=mysql_fetch_row($result);
							echo "<span class='article-author color-gray-light'><i class='fa fa-book opacity-50'></i>$row[2]</span>";
					?>
					<!--<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Townhall Tranformasi</span>-->
					
				</div>
			</div>
			<div class="store-categories-small">
			<?php if($id==59){
				echo'<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 1</em></a>';
				echo'<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 2</em></a>';
				echo'<a href="#" data-deploy-menu="hari-3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>';
				}else{
					echo'<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-blue-dark font-20"></i><em>Hari 1</em></a>';
					
				} ?>
				<!--<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-blue-dark font-20"></i><em>Hari 1</em></a>
				<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-red-dark font-20"></i><em>Hari 2</em></a>-->
			<!--	<a href="#" data-deploy-menu="hari-3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a> -->
				<div class="decoration"></div>
			</div>


			<div class="content">
			<br>
				<a href="menu.php?q=<?php echo $key; ?>&id=<?php echo $id; ?>" type="button" class="buttonWgeneraterap button button-green button-sm button-rounded uppercase ultrabold contactSubmitButton"   >Kembali</a>	
			<br>
			</div>
			<!-- Menu Modal -->
			
						
							<?php
							if($id==59){
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='10' order by schedule_begin ASC");
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
								
			
								
							}else{
							$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' order by schedule_begin ASC");
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
							echo"<strong class='color-gray-dark'>$row[10]</strong>";
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
							}
	
							?>	
							<br>
				<br>
						</div>
						<div class="bottom-rundown"></div>
					</div>
				</div>
				
			</div>

			<!--Hari ke-2-->
			<?php
			if($id==59){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='11' order by schedule_begin ASC");
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
							}
						?>
							<br>
							<br>
						</div>
						<div class="bottom-rundown"></div>
					</div>
				</div>
			</div>

			<!--Hari ke-3-->
			<?php
			if($id==59){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='12' order by schedule_begin ASC");
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
							}
						?>
						
						
							<br>
							<br>
						</div>
						<div class="bottom-rundown"></div>
					</div>
				</div>
			</div>

						<!--Hari ke-4-->
			<?php
			if($id==53){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='17' order by schedule_begin ASC");
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
							}
						?>
						
						
							<br>
							<br>
						</div>
						<div class="bottom-rundown"></div>
					</div>
				</div>
			</div>
									<!--Hari ke-5-->
			<?php
			if($id==53){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='18' order by schedule_begin ASC");
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
							}
						?>
						
						
							<br>
							<br>
						</div>
						<div class="bottom-rundown"></div>
					</div>
				</div>
			</div>
									<!--Hari ke-3-->
			<?php
			if($id==53){
			$result=mysql_query("SELECT * FROM tb_pevita_jadwal where event_id='$id' and event_kanwil='$kode_unit_kerja' and tgl='19' order by schedule_begin ASC");
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
							}
						?>
						
						
							<br>
							<br>
						</div>
						<div class="bottom-rundown"></div>
					</div>
				</div>
			</div>
		</div> 
		<?php include 'inc/footermenu.php' ?>
	</div>
</div>
	
<?php include 'inc/footer.php'; ?>	
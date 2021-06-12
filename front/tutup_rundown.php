<?php 
include 'inc/header.php'; 
include 'inc/secretkey.php';
$key = $_GET['q'];
if ($key!=KEY::SECRET_KEY) {
	echo KEY::MESSAGE;
	exit;
}
include 'inc/db_con.php'; 
?>	

<div id="page-transitions">
	<?php include 'inc/top_nav.php'; ?>			
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content">	
		<div id="page-content-scroll"><!--Enables this element to be scrolled -->
	
			<div class="article-card article-full no-bottom">
				<div class="article-header">
					<span class="article-overlay"></span>
					<span class="article-image preload-image" data-src-retina="images/pictures/jadwal.png" data-src="images/pictures/jadwal.png"></span>
					<span class="article-category color-white bg-green-dark uppercase">Jadwal Kegiatan</span>
					<span class="article-author color-gray-light"><i class="fa fa-book opacity-50"></i>Rakernas 2017-2018</span>
				</div>
			</div>
			<div class="store-categories-small">
				<a href="#" data-deploy-menu="hari-1"><i class="fa fa-calendar color-blue-dark font-20"></i><em>Hari 1</em></a>
				<a href="#" data-deploy-menu="hari-2"><i class="fa fa-calendar color-red-dark font-20"></i><em>Hari 2</em></a>
				<a href="#" data-deploy-menu="hari-3"><i class="fa fa-calendar color-green-dark font-20"></i><em>Hari 3</em></a>
				<div class="decoration"></div>
			</div>


			<!-- Menu Modal -->
			<div id="hari-1" class="menu-wrapper menu-light menu-modal-full menu-large">
				<div class="menu-scroll">
					<div class="calendar-full content ">
						<div class="cal-footer">
						<a href="#" class="header-icon header-icon header-icon-1 close-menu" data-deploy-menu="menu-1"></a>
						<h5 class="cal-sub-title uppercase ultrabold bg-green-corp2 close-menu"><i class="fa fa-arrow-left color-white font-16"></i>&nbsp;&nbsp;Rakernas - Hari 1</h5>
							<span class="cal-message half-top">
								<i class="fa fa-map-marker font-18 color-red-dark"></i>
								<strong class="color-gray-dark">Hotel Novotel - Bogor</strong>
								<strong class="color-gray-dark">Selasa, 5 Desember 2017</strong>
							</span>
							<div class="decoration half-top no-bottom"></div>
									<?php
								$result=mysql_query('SELECT * FROM tb_pevita_jadwal where tgl=5');
								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[5]</span>";
									echo "</div>";
								}
							?>	
						</div>

					</div>
				</div>
			</div>

			<!--Hari ke-2-->
			<div id="hari-2" class="menu-wrapper menu-light menu-modal-full menu-large">
				<div class="menu-scroll">
					<div class="calendar-full content full-bottom">
						<div class="cal-footer">
						<h5 class="cal-sub-title uppercase ultrabold bg-green-corp2 close-menu"><i class="fa fa-arrow-left color-white font-16"></i>&nbsp;&nbsp;Rakernas - Hari 2</h5>
							<span class="cal-message half-top">
								<i class="fa fa-map-marker font-18 color-red-dark"></i>
								<strong class="color-gray-dark">Hotel Novotel - Bogor</strong>
								<strong class="color-gray-dark">Rabu, 6 Desember 2017</strong>
							</span>
							<div class="decoration half-top no-bottom"></div>
							<?php
								$result=mysql_query('SELECT * FROM tb_pevita_jadwal where tgl=6');
								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[5]</span>";
									echo "</div>";
								}
							?>	
						</div>
						<div class="bottom-rundown"></div>
					</div>
				</div>
			</div>

			<!--Hari ke-3-->
			<div id="hari-3" class="menu-wrapper menu-light menu-modal-full menu-large">
				<div class="menu-scroll">
					<div class="calendar-full content full-bottom">
						<div class="cal-footer">
						<h5 class="cal-sub-title uppercase ultrabold bg-green-corp2 close-menu"><i class="fa fa-arrow-left color-white font-16"></i>&nbsp;&nbsp;Rakernas - Hari 3</h5>
							<span class="cal-message half-top">
								<i class="fa fa-map-marker font-18 color-red-dark"></i>
								<strong class="color-gray-dark">Hotel Novotel - Bogor</strong>
								<strong class="color-gray-dark">Kamis, 7 Desember 2017</strong>
							</span>
							<div class="decoration half-top no-bottom"></div>
							<?php
								$result=mysql_query('SELECT * FROM tb_pevita_jadwal where tgl=7');
								while ($row=mysql_fetch_row($result)){
									echo "<div class='cal-schedule'>";
									echo "<em>$row[1]<br>$row[2]</em>";
									echo "<strong>$row[4]</strong>";
									echo "</a>";
									echo "<span><i class='fa fa-user'></i>$row[5]</span>";
									echo "</div>";
								}
							?>	
						</div>
						<div class="bottom-rundown"></div>
					</div>
				</div>
			</div>
		</div> 
	</div>
</div>
	
<?php include 'inc/footer.php'; ?>	
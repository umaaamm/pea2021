<?php 
include 'inc/db_con.php';
?>	
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<title>Pegadaian Event App.</title>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/custom.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>

<body>
<div id="page-transitions">
	<div id="header" class="header-logo-app header-dark">
		<a href="#" class="header-logo"></a>
		<a href="#" class="header-icon header-icon header-icon-4" data-deploy-menu="menu-1"></a>
	</div>		
	<div class="reading-bar"><div class="reading-line"></div></div>
	
	<div id="page-content" class="page-content">	
		<div id="page-content-scroll"><!--Enables this element to be scrolled -->
			<div class="content reading-time-box reading-words">
				<div class="content">
					<div class="container no-bottom">
						<div class="contact-form no-bottom">		
						</div>
						<div class="content">
							<h5 class='small-bottom ultrabold'>DAFTAR PERTANYAAN</h5>
							<?php
							$sesi = $_POST['sesi'];
								$result=mysql_query("SELECT * FROM tb_pevita_qa where sesi='$sesi'");
								//$result=mysql_query("SELECT * FROM tb_pevita_qa WHERE sesi='$sesi'");
								while ($row=mysql_fetch_row($result)){
									echo "<div class='news-list-item2'>";
									echo "<h5 class='small-bottom ultrabold'><a href='#'>";
									echo "<strong>$row[1]</strong></font> bertanya:";
									echo "</a></h5>";
									echo "<h4 class='small-bottom ultrabold'><i class='fa fa-question-circle'></i>&nbsp;&nbsp;$row[2]</h4>";
									echo "</div>";
								}
							?>
						</div>
					</div>
					
				</div>
			</div>
		</div>  
	</div>
	
</div>

<?php include 'inc/footer.php'; ?>	
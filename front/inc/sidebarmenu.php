<?php 
require_once 'constant.php';
require_once 'library.php';
$key = $_GET['q'];
	$id = $_REQUEST['id'];

?>	
	<div id="menu-1" class="menu-wrapper menu-light menu-sidebar-left menu-large">
		<div class="menu-scroll">
			<a href="menu.php?q=<?php echo $key ?>&id=<?php echo $id;?>"" class="menu-logo"></a>
			<em class="menu-sub-logo">Pegadaian Event Assistant</em>					
			<div class="menu">
				<a class="menu-item close-menu" href="update-user.php?q=<?php echo $key ?>&id=<?php echo $id;?>"><i class="font-14 fa color-orange-dark fa-key"></i><strong>Update Kata Sandi</strong></a>
				<!--<a class="menu-item close-menu" href="update-rekening.php?q=<?php echo $key ?>&id=<?php echo $id;?>"><i class="font-14 fa color-brown-dark fa-book"></i><strong>Update Rekening</strong></a>-->
				<a class="menu-item close-menu" href="inc/logout.php?q=<?php echo $key ?>&id=<?php echo $id;?>"><i class="font-14 fa color-green-dark fa-times"></i><strong>Keluar</strong></a>
			</div>
		</div>
	</div>
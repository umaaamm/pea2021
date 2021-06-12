<?php
include 'inc/header.php';
include 'inc/constant.php';
include 'inc/library.php';

$key = enkripsi(APP_CONST::APP_KEY);
include 'inc/secretkey.php';
$seckey = $_GET['q'];
if ($seckey!=KEY::SECRET_KEY) {
	echo KEY::PESAN;
	exit;
}
?>


<div id="preloader" class="preloader-light" style="transition: all 4000ms ease !important;">
	<h1></h1>
	<div id="preload-spinner"></div>
	<p>PEVITA</p>
	<em>2.0</em>
</div>
	

		<div id="page-content-scroll" style="padding-top:10px !important; background-color: #000000 !important;"><!--Enables this element to be scrolled --> 	
			<div class="profile-2">
				<img class="profile-image preload-image" data-src="images/pictures/0s.png" alt="img">
				<div class="profile-body">
					<form action="inc/proses_login.php" method="post" id="loginForm">	
						<div class="page-login content-boxed content-boxed-padding no-top no-bottom">
							<h3 class="uppercase ultrabold full-top no-bottom">Login</h3>
							<p class="smaller-text half-bottom" style="margin-top:2px;">Hai! Masukkan NIK, Kata Sandi, dan Tgl Lahir</p>
								<div class="page-login-field half-top">
									<i class="fa fa-user"></i>
									<input type="text" placeholder="NIK Karyawan" id="username" name="username">
								</div>		
								<div class="page-login-field half-bottom">
									<i class="fa fa-lock"></i>
									<input type="password" placeholder="Kata Sandi" id="sandi" name="sandi">
								</div>
								<div class="page-login-field half-bottom">
									<i class="fa fa-calendar"></i>
									<input type="password" placeholder="Tgl. Lahir. Format yyyymmdd" id="password" name="password">
									<input type="hidden"  id="key" name="key" value="<?php echo $key;?>">
								</div>
								<div class="page-login-links small-bottom" style="margin-bottom: 5px !important;">
									<div class="clear"><br></div>
								</div>
								<div class="formSubmitButtonErrorsWrap contactFormButton">
									<input type="submit" class="buttonWrap button button-blue button-sm button-rounded uppercase ultrabold contactSubmitButton" id="submit" name="submit" value="LOGIN" data-formId="loginForm" />
								</div>
						</div>	
					</form>	
					<div class="decoration decoration-margins"></div>
					<div class="decoration decoration-margins half-top"></div>
					<div class="decoration decoration-margins half-top"></div>
				</div>
			</div> 
		</div> 



<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script type="text/javascript" src="scripts/plugins.js"></script>



</body>
</html>
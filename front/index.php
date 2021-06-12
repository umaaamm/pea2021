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
	
<div id="page-transitions">
	<div id="page-content" class="page-content" style="background-color:#000000 !important;">	
		<div id="page-content-scroll" style="transition: all 0ms ease !important; padding-top:10px !important; background-color: #000000 !important;"><!--Enables this element to be scrolled --> 	
			<div class="cover-item cover-item-full" style="background-image:url(images/bg.png);">
				<div class="cover-content cover-content-center" style="margin-top: -270.275px !important;">
					<form action="inc/proses_login.php" method="post" id="loginForm">	
						<div class="page-login content-boxed content-boxed-padding no-top no-bottom">
							<img class="preload-image login-bg responsive-image no-bottom" src="images/cover.png" data-src="images/cover.png" alt="img">
							<img class="preload-image login-image" src="images/login.jpeg" data-src="images/login.jpeg" alt="img">
							<h3 class="uppercase ultrabold full-top no-bottom">Login</h3>
							<p class="smaller-text half-bottom" style="margin-top:2px;">Hai! Masukkan NIK, Kata Sandi, dan Tgl Lahir</p>
								<!--
								<div class="formValidationError bg-red-dark" id="usernameError">
									<p class="center-text uppercase small-text color-white">User ID Harus Diisi</p>
								</div>
								<div class="formValidationError bg-red-dark" id="passwordError">
									<p class="center-text uppercase small-text color-white">Password Harus Diisi</p>
								</div> -->
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
									<!--
									<a class="forgot float-right" href="page-signup.html"><i class="fa fa-user float-right"></i>Buat Akun!</a>
									<a class="create float-left" href="page-forgot.html"><i class="fa fa-eye"></i>Lupa Password?</a>
									-->
									<div class="clear"><br></div>
								</div>
								<div class="formSubmitButtonErrorsWrap contactFormButton">
									<input type="submit" class="buttonWrap button button-blue button-sm button-rounded uppercase ultrabold contactSubmitButton" id="submit" name="submit" value="LOGIN" data-formId="loginForm" />
								</div>
						</div>	
					</form>	

				</div>
				<div class="cover-overlay overlay bg-black opacity-90"></div>
			<!--</div>	-->
		</div>  
	</div> 
</div>
	</div>

<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script type="text/javascript" src="scripts/plugins.js"></script>



</body>
</html>
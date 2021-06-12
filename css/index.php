<?
// [1] Inisialiasi awal
header('Pragma : no-cache');
$this_file='index.php';
require_once("template.db.php");

if (isset($_POST['uid'])) $uid=$_POST['uid'];
else $uid=$_GET['uid'];
if (strlen($uid)!=0) 
	{
	$uid=dekripsi($uid);
	session_start();
	session_unregister("$uid");
		
	session_destroy();		
	$info="Anda sudah logout";				
	$ix=enkripsi($info);
	$header="../?ix=$ix&LOGOUT";
	}
else
	{	
	$ix="Login salah";
	$ix=enkripsi($ix);
	$header="../?ix=$ix&ERR_";
	}
?>
<html>
<head>
<title><?=$APP_TITLE?> | Please wait...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="language" content="english">
<link rel="shortcut icon" href="favicon.ico" >
<link rel="icon" href="animated_favicon.gif" type="image/gif" >
</head>

<body onLoad="document.location='<?=$header?>'">

<p>&nbsp;</p>
<p align="center"><img src="../images/progress_large.gif"></p>
</body>
</html>

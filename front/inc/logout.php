<?php 
include 'secretkey.php';
$key = $_GET['q'];

session_start();
unset($_SESSION['username']);
echo '<script language="javascript">document.location="../index.php?q='.$key.'";</script>';
?>
<?php

/** By Adi Riswan 2018
 * 
 * @param unknown_type $string
 * @return string
 */

function enkripsi( $string) {
	$secret_key = 'P3g4Da!Anm47u';
	$secret_iv  = 'Ad3eR!5w4n';
	$output = false;
	$encrypt_method = "AES-256-CBC";
	$key = hash( 'sha256', $secret_key );
	$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	return $output;
}

function dekripsi( $string ) {
	$secret_key = 'P3g4Da!Anm47u';
	$secret_iv  = 'Ad3eR!5w4n';
	$output = false;
	$encrypt_method = "AES-256-CBC";
	$key = hash( 'sha256', $secret_key );
	$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
	return $output;
}

// -------------------------------------------------------------------------------------- //
// Fungsi bersih bersih: SECURITY HIGH!
// -------------------------------------------------------------------------------------- //
function secureinput($str_input)
	{	
	$sign=array("'","`","<",">","#","%","$","\\","{","}","[","]","+","*","|","=");
	$random=rand();
	
	$str_input = trim($str_input);	
	foreach ($sign as $v) 
		{
   		$str_input=str_replace("$v","ERR$random","$str_input");
   		}
	$str_input = strip_tags($str_input);
	if (get_magic_quotes_gpc()) $str_input = stripslashes($str_input);
	$str_input = mysql_real_escape_string($str_input);	
	return $str_input;
	}
// -------------------------------------------------------------------------------------- //	

// -------------------------------------------------------------------------------------- //
// Fungsi bersih bersih: SECURITY low
// -------------------------------------------------------------------------------------- //
function lowsecure($str_input)
	{	
	$str_input = strip_tags($str_input);
	if (get_magic_quotes_gpc()) $str_input = stripslashes($str_input);	
	$str_input = mysql_real_escape_string($str_input);	
	$str_input = str_replace("'","`",$str_input);
	$str_input = str_replace('"','``',$str_input);
	return $str_input;
	}
// -------------------------------------------------------------------------------------- //	



?>
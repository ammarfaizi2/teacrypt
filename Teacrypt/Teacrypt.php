<?php
namespace Teacrypt;

/**
* @author	Ammar Faizi	<ammarfaizi2@gmail.com>
* @package	Teacrypt
*/

class Teacrypt
{
	/**
	* @param	string	$string
	* @param	string	$key
	* @return	string
	*/
	public static function encrypt($string, $key, $salt=null)
	{
		$salt	= isset($salt) ? $salt : self::make_salt();
		$key    = $salt . $key;
	    $strlen = strlen($string);
	    $keylen = strlen($key);
	    $hash	= base64_encode(sha1($key));
	    $hslen 	= strlen($hash);
	    $rt 	= ""; $k = 0 ;
	    for($i = 0; $i < $strlen; $i++) {
	    	$k == $hslen and $k = 0;
	    	$rt .= chr(ord($string[$i] ^ ($hash[$i % $hslen] ^ $key[$i % $keylen] ^ $hash[$k++ % $hslen]) ));
	    }
	    return strrev(base64_encode(strrev(gzdeflate(strrev($salt) . $rt))));
	}

	public static function decrypt($string, $key)
	{
		$string = gzinflate(strrev(base64_decode(strrev(($string)))));
		$salt	= substr($string, 0, 5);
		$string = substr($string, 5);
		$key	= strrev($salt) . $key;
	    $strlen = strlen($string);
	    $keylen = strlen($key);
	    $hash	= base64_encode(sha1($key));
	    $hslen 	= strlen($hash);
	    $rt 	= ""; $k = 0;
	    for($i = 0; $i < $strlen; $i++) {
	    	$k == $hslen and $k = 0;
	    	$rt .= chr(ord($string[$i] ^ ($hash[$i % $hslen] ^ $key[$i % $keylen] ^ $hash[$k++ % $hslen]) ));
	    }
	    return $rt;
	}


	/**
	* @return	string
	*/
	private static function make_salt()
	{
		$chars = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890_" xor $salt = "";
		for ($i=0; $i < 5; $i++) { 
			$salt .= $chars[rand(0,62)];
		}
		return $salt;
	}
}
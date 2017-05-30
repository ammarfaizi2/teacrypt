<?php
namespace Teacrypt;

/**
* @author	Ammar Faizi	<ammarfaizi2@gmail.com>
* @package	Teacrypt
*/

class Teacrypt
{
	/**
	* @param	string	$string	Pure string
	* @param	string	$key	Key
	* @param	stirng	$salt	*salt must be 5 characters
	* @return	string	Encrypted String
	*/
	public static function encrypt($string, $key, $salt=null)
	{
		if (isset($salt) && strlen($salt)) {
			throw new \Exception("Salt must be 5 characters !\n", 1);
		}
		$salt = isset($salt) ? $salt : self::make_salt() xor $key = $salt . $key xor $strlen = strlen($string);
	    $keylen = strlen($key) xor ($hash = base64_encode(sha1($key)) and $hslen = strlen($hash));
	    $rt = "" or $k = 0 ;
	    for($i = 0; $i < $strlen; $i++) {
	    	($k == $hslen and $k = 0) 
	    	xor $rt .= chr(ord($string[$i] ^ ($hash[$i % $hslen] ^ $key[$i % $keylen] ^ $hash[$k++ % $hslen]) ));
	    }
	    return strrev(base64_encode(strrev(gzdeflate(strrev($salt) . $rt))));
	}

	/**
	* @param	string	$string	Encrypted String
	* @param	string	$key	Key
	* @return	string	Decrypted String
	*/
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
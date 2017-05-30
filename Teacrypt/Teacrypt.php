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
	public static function encrypt($string, $key)
	{
		$salt	= self::make_salt();
		$key    = $salt . $key;
	    $strlen = strlen($string);
	    $keylen = strlen($key);
	    $hash	= sha1($key);
	    $hslen 	= strlen($hash);
	    $rt 	= "";
	    for($i = 0; $i < $strlen; $i++) {
	    	$rt .= chr(ord($string[$i] ^ ($hash[$i % $hslen] ^ $key[$i % $keylen]) ));
	    }

	    return $salt . $rt;
	}

	public static function decrypt($string, $key)
	{
		$salt	= substr($string, 0, 5);
		$string = substr($string, 5);
		$key	= $salt . $key;
	    $strlen = strlen($string);
	    $keylen = strlen($key);
	    $hash	= sha1($key);
	    $hslen 	= strlen($hash);
	    $rt 	= "";
	    for($i = 0; $i < $strlen; $i++) {
	    	$rt .= chr(ord($string[$i] ^ ($hash[$i % $hslen] ^ $key[$i % $keylen]) ));
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
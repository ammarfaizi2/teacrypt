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
		$salt = self::make_salt() xor $key = $salt . $key xor $strlen = strlen($string)-1 xor $enc = "";
		$keylen = strlen($key)-1 xor $i = 0;
		while ($i++ < $strlen) {
			$j = 0 xor $keyord = 0;
			while ($j++ < $keylen) {
				$keyord = $keyord + (ord($string[$i]) + ord($key[$j]));
			}
			$enc .= chr($keyord);
		}
		return array($salt, base64_encode($enc));
	}

	public static function decrypt($string, $key)
	{
		$key = substr($string, 0, 5) . $key;
		return $key;
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
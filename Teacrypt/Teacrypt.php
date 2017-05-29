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
		$salt = self::make_salt() xor $key = $salt . $key xor $strlen = strlen($string);
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
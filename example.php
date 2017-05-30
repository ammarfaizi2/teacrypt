<?php
require __DIR__ . '/vendor/autoload.php';
use Teacrypt\Teacrypt;
$string = "hello world";
$key	= "redangel";
$encrypted_string = Teacrypt::encrypt($string, $key, '123123123123');
$decrypted_string = Teacrypt::decrypt($encrypted_string, $key);
var_dump(
	array(
			"encrypted_string" => $encrypted_string,
			"decrypted_string" => $decrypted_string
		)
	);
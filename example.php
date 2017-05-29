<?php
require __DIR__ . '/vendor/autoload.php';
use Teacrypt\Teacrypt;

$encrypted_string = Teacrypt::encrypt("hello world", "redangel");
$decrypted_string = Teacrypt::encrypt($encrypted_string[1], $encrypted_string[0]);
var_dump(
	array(
			"encrypted_string" => $encrypted_string,
			"decrypted_string" => $decrypted_string
		)
	);
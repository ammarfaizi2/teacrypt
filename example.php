<?php
require __DIR__ . '/vendor/autoload.php';
use Teacrypt\Teacrypt;

/**
*
* @author	Ammar Faizi	<ammarfaizi2@gmail.com>
*
*/

$string = "hello world";
$key    = "redangel";
$encrypted_string = Teacrypt::encrypt($string, $key);
$decrypted_string = Teacrypt::decrypt($encrypted_string, "redangel");
var_dump(
    array(
            "encrypted_string" => $encrypted_string,
            "decrypted_string" => $decrypted_string
        )
    );

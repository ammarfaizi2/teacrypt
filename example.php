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
$encrypted_string1 = Teacrypt::encrypt($string, $key);
$decrypted_string2 = Teacrypt::decrypt($encrypted_string1, $key);

$encrypted_string2 = Teacrypt::encrypt($string, $key);
$decrypted_string2 = Teacrypt::decrypt($encrypted_string2, $key);

?><pre><?php
var_dump(array(
        "hasil kesamaan enkripsi 1 dan 2" => ($encrypted_string1 == $encrypted_string2),
        "encrypted_string" => array($encrypted_string1, $encrypted_string2),
        "decrypted_string" => array($decrypted_string2, $decrypted_string2)
    ));
?></pre>

<h3>Code file ini :</h3>

<?php show_source(__FILE__); ?>


# Teacrypt

## Encryption solution


## Keunggulan Teacrypt
- Proses enkripsi menggunakan salt. Sehingga hasil enkripsi selalu berbeda walaupun dengan key yang sama.
### Ilustrasi
```php
<?php
require __DIR__ . '/vendor/autoload.php';
use Teacrypt\Teacrypt;

$string = "hello world";
$key    = "redangel";
$encrypted_string1 = Teacrypt::encrypt($string, $key);
$decrypted_string2 = Teacrypt::decrypt($encrypted_string1, $key);

$encrypted_string2 = Teacrypt::encrypt($string, $key);
$decrypted_string2 = Teacrypt::decrypt($encrypted_string2, $key);

var_dump(array(
        "hasil kesamaan enkripsi 1 dan 2" => ($encrypted_string1 == $encrypted_string2),
        "encrypted_string" => array($encrypted_string1, $encrypted_string2),
        "decrypted_string" => array($decrypted_string2, $decrypted_string2)
    ));
```
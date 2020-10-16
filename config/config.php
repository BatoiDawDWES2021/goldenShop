<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
require dirname(__FILE__) . "/connection.php";
require dirname(__FILE__) . "/../objects/Product.php";
require dirname(__FILE__) . "/../objects/ShoppingCart.php";
require dirname(__FILE__) . "/../helpers/myHelpers.php";



loadWhoops();

$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);

define('PES_ONZA',31,1);
$preu = array ('Gold'=>1800, 'Silver'=> 26, 'Platinum' => 900);
$shipping = array ('03','46');

$products = Product::selectAll($conn);
$order = new ShoppingCart();

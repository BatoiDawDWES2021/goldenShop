<?php
require dirname(__FILE__) . "/../vendor/autoload.php";

function dd($param){
    var_dump($param);
    exit();
}

$preuOzGold = 1800;
$preuOzSilver = 26;
define('PES_ONZA',31.1);
define('PES_BARGOLD',100);
define('PES_BARSILVER',1000);



$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
return $whoops;

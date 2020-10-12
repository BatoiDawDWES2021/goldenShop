<?php
session_start();
require dirname(__FILE__) . "/../objects/ShoppingCart.php";

if( parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) {
    echo "Forbiden";
} else {
    $order = new ShoppingCart();
    $order->delProduct($_GET['prod']);
    $order->save();
    header("Location:processOrder.php");
}
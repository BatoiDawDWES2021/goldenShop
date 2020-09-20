<?php
session_start();
if( parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) {
    echo "Forbiden";
} else {
    $order = unserialize($_SESSION['order']);
    $product = $_GET['prod'];
    unset($order[$product]);
    $_SESSION['order'] = serialize($order);
    header("Location:processOrder.php");
}
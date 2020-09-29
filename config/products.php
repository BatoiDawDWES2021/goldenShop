<?php

define('PES_ONZA',31,1);

$preu = array ('Gold'=>1800, 'Silver'=> 26, 'Platinum' => 900);

$sql = "SELECT *  FROM products";
$rQuery =  $conn->query($sql);
$products = $rQuery->fetchAll();



$shipping = array ('03','46');


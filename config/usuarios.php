<?php

require dirname(__FILE__) . "/connection.php";

$sql = "SELECT *  FROM users";
$rQuery =  $conn->query($sql);
$usuarios = $rQuery->fetchAll();
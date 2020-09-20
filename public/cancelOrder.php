<?php
    session_start();
    unset($_SESSION['order']);
    unset($_SESSION['address']);
    session_destroy();
    header("Location:processOrder.php");
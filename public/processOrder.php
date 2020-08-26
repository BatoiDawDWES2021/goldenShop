<?php
include_once dirname(__FILE__) . '/../config/config.php';
$preuOzG = $_POST['goldcointqty'] * $preuOzGold;
$preuOzS = $_POST['silvercointqty'] * $preuOzSilver;
$preuBAG = $_POST['goldbarqty'] * ($preuOzGold/PES_ONZA)*PES_BARGOLD;
$preuBAS = $_POST['silverbarqty'] * ($preuOzSilver/PES_ONZA)*PES_BARSILVER;
$total = $preuOzG + $preuOzS + $preuBAG + $preuBAS;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Process Order</title>
</head>
<body style="margin: 20px;">
    <h1>Batoi's BuyGOLD</h1>
    <h2>Order Result</h2>
    <table>
        <tr><td>Oz. Gold</td><td><?= $preuOzG ?></td></tr>
        <tr><td>Oz. Silver</td><td><?= $preuOzS ?></td></tr>
        <tr><td>Bar Gold</td><td><?= $preuBAG ?></td></tr>
        <tr><td>Bar Silver</td><td><?= $preuBAS ?></td></tr>
        <tr><td>Total</td><td><?= $total ?></td></tr>
    </table>
    <p>
    <?php echo ($total> 10000)?"pago en targeta":"pago al contado"; ?>
    </p>
</div>
</body>
</html>


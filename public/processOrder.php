<?php
require_once dirname(__FILE__) . '/../config/config.php';
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
    <p><?= 'Order processed at '.date("H:i, jS F"); ?></p>
    <table>
        <?php
            $total = 0;
            foreach ($products as $product){
                $id =  str_replace('.','_',$product['quantity']).$product['format'].$product['metal'];
                if (is_numeric($_POST[$id])){
                    $descripcion = $product['quantity'].' '.$product['format'].' '.$product['metal'];
                    $valorMetal = $product['metal'] == 'Gold'?$preu['Gold']:$preu['Silver'];
                    $valorTotal = $product['format'] == 'Coin'?$valorMetal*$product['quantity']:($valorMetal/PES_ONZA)*$product['quantity'];
                    $preuLinea = $_POST[$id] * $valorTotal;
                    $total += $preuLinea;
        ?>
            <tr><td><?= $_POST[$id] ; ?></td><td><?= $descripcion ?></td><td><?php printf("%.2f",$preuLinea); ?></td></tr>
        <?php
                }
            }
        ?>
        <tr><td>Total</td><td><?php printf("%.2f",$total); ?></td></tr>
    </table>
    <p><a class="btn btn-primary" href="processAdress.php" role="button">Address Info</a>
    </p>
</div>
</body>
</html>


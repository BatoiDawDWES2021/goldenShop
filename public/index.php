<?php
    include_once dirname(__FILE__) . '/../config/config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Order</title>
</head>
<body style="margin: 20px;">
<div class="container" >
    <form action="processOrder.php" method="post">
        <?php
            foreach ($products as $product){
        ?>
            <div class="form-group row">
                <label for="<?= id($product) ?>" class="col-sm-3 col-form-label col-form-label-sm"><?= description($product) ?> (<?= preu($product) ?>)</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="<?= id($product) ?>"" name="<?= id($product) ?>"" placeholder="Enter quantity">
                </div>
                <div class="col-sm-3"><img width="70px" height="70px" src="/img/<?= id($product)?>.jpg"/></div>
            </div>
        <?php
            }
        ?>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

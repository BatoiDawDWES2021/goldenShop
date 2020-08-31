<?php
require_once('../templates/header.php');
?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php require_once ('../templates/category.php'); ?>
        <div class="col-lg-9">
        <?php if (count($_POST) > 0) { ?>
        <div class="container">
            <h1>Batoi's BuyGOLD</h1>
            <h2>Order Result</h2>
            <p><?= 'Order processed at '.date("H:i, jS F"); ?></p>
            <table>
                <?php
                    $total = 0;
                    foreach ($products as $product){
                        $amount = $_POST[id($product)];
                        if (is_numeric($amount)){
                            $preuLinea = valorTotal($amount,$product);
                            $total += $preuLinea;
                ?>
                    <tr><td><?= $amount ?></td><td><?= description($product) ?></td><td><?php printf("%.2f",$preuLinea); ?></td></tr>
                <?php
                        }
                    }
                ?>
                <tr><td>Total</td><td><?php printf("%.2f",$total); ?></td></tr>
            </table>
            <p><a class="btn btn-primary" href="processAdress.php" role="button">Address Info</a>
            </p>
        </div>
        <?php } else { ?>
        <div class="container" >
            <form action="processOrder.php" method="post">
                <?php
                foreach ($products as $product){
                    ?>
                    <div class="form-group row">
                        <label for="<?= id($product) ?>" class="col-sm-5 col-form-label col-form-label-sm"><?= description($product) ?> (<?= preu($product) ?>)</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="<?= id($product) ?>"" name="<?= id($product) ?>"" placeholder="Enter quantity">
                        </div>
                        <div class="col-sm-5"><img width="70px" height="70px" src="/img/<?= id($product)?>.jpg"/></div>
                    </div>
                    <?php
                }
                ?>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    <?php } ?>
        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php
require_once ('../templates/footer.php');
?>


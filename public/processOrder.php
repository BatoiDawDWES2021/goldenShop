<?php
session_start();
require_once('../templates/header.php');
?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php require_once('../templates/category.php'); ?>

            <?php if (count($_POST) > 0) { ?>
        <div class="col-lg-6 col-md-6">
            <div class="ibox">
                <div class="ibox-title">
                    <span class="pull-right">(<strong><?= count($_POST) ?></strong>) items</span>
                    <h5>Batoi's BuyGOLD - Items in your cart</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table shoping-cart-table">
                            <tbody>
                            <?php
                            $_SESSION['order'] = serialize($_POST);
                            $total = 0;
                            foreach ($products as $product) {
                                $amount = $_POST[id($product)];
                                if (is_numeric($amount)) {
                                    $preuLinea = valorTotal($amount, $product);
                                    $total += $preuLinea;
                                    ?>
                                    <tr>
                                        <td width="80">
                                            <div class="cart-product-imitation">
                                                <img height="70x" width="70x" src="/img/<?= id($product) ?>.jpg"/>
                                            </div>
                                        </td>
                                        <td class="desc">
                                            <h3>
                                                <a href="#" class="text-navy">
                                                    <?= description($product) ?>
                                                </a>
                                            </h3>
                                            <div class="m-t-sm">
                                                <a href="removeItem.php?prod=<?= id($product) ?>" class="text-muted"><i
                                                            class="fa fa-trash"></i> Remove item</a>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $amount ?>
                                        </td>
                                        <td>
                                            <h5><?php printf("%.2f €", $preuLinea); ?></h5>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else { ?>
        <div class="col-lg-6 col-md-6">
            <form action="processOrder.php" method="post">
                <?php
                foreach ($products as $product) {
                    ?>
                    <div class="form-group row">
                        <label for="<?= id($product) ?>"
                               class="col-sm-5 col-form-label col-form-label-sm"><?= description($product) ?>
                            (<?= preu($product) ?>)</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="<?= id($product) ?>" name="<?= id($product) ?>" placeholder="Enter quantity">
                        </div>
                        <div class="col-sm-5"><img width="70px" height="70px" src="/img/<?= id($product) ?>.jpg"/></div>
                    </div>
                    <?php
                }
                ?>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <?php  }  require_once('../templates/cartSumary.php');?>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<?php
require_once('../templates/footer.php');
?>


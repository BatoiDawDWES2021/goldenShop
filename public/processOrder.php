<?php
session_start();
require_once('../templates/header.php');
?>
<!-- Page Content -->
<div class="container">

    <div class="row">
        <?php
            require_once('../templates/category.php');
            if (count($_POST) > 0) {
                $order->addProducts($_POST);
                require_once('../templates/shoppingCart.php');
            } else {
                require_once('../templates/formShop.php');
            }
            require_once('../templates/cartSumary.php');
        ?>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<?php
require_once('../templates/footer.php');
?>


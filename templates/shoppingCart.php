<div class="col-lg-6 col-md-6">
    <div class="ibox">
        <div class="ibox-title">
            <span class="pull-right">(<strong><?= $order->count() ?></strong>) items</span>
            <h5>Batoi's BuyGOLD - Items in your cart</h5>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table shoping-cart-table">
                    <tbody>
                    <?php
                    foreach ($order->allProducts() as $codi => $quantity) {
                        $product = Product::select($conn,$codi);
                        $amount = $product->preu();
                        $preuLinea = $quantity * $amount;
                            ?>
                            <tr>
                                <td width="80">
                                    <div class="cart-product-imitation">
                                        <img height="70x" width="70x" src="<?= $product->img() ?>"/>
                                    </div>
                                </td>
                                <td class="desc">
                                    <h3>
                                        <a href="#" class="text-navy">
                                            <?= $product ?>
                                        </a>
                                    </h3>
                                    <div class="m-t-sm">
                                        <a href="removeItem.php?prod=<?= $product->getCodi() ?>" class="text-muted"><i
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
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

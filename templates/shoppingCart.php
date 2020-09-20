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
                    $items = unserialize($_SESSION['order']);
                    $total = 0;
                    foreach ($products as $product) {
                        $amount = $items[id($product)];
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

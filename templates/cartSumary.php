
    <div class="ibox">
        <div class="ibox-title">
            <h5>Cart Summary</h5>
        </div>
        <div class="ibox-content">
                    <span>
                        Total
                    </span>
            <h2 class="font-bold">
                <?php printf("%.2f €",totalShopping()); ?>
            </h2>
            <div class="m-t-sm">
                <div class="btn-group">
                    <a href="processAdress.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</a>
                    <a href="cancelOrder.php" class="btn btn-white btn-sm"> Cancel</a>
                </div>
            </div>
        </div>
    </div>

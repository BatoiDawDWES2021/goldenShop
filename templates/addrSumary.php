
    <div class="ibox">
        <div class="ibox-title">
            <h5>Adress Summary</h5>
        </div>
        <div class="ibox-content">
            <?php
                $address = $_SESSION['address']?unserialize($_SESSION['address']):[];
                foreach ($address as $key => $value){
                    echo "<p><span><b>".ucfirst($key)."</b> : ".htmlspecialchars($value)."</span></p>";
                }
            ?>
            <div class="m-t-sm">
                <div class="btn-group">
                    <a href="processPayment.php" class="btn btn-primary btn-sm"><i class="fa fa-credit-card"></i> Payment</a>
                    <a href="cancelOrder.php" class="btn btn-white btn-sm"> Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

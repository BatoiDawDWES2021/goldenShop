<div class="col-lg-6 col-md-6">
    <form action="processOrder.php" method="post">
        <?php
        foreach ($products as $product) {
            ?>
            <div class="form-group row">
                <label for="<?= $product->getCodi() ?>"
                       class="col-sm-5 col-form-label col-form-label-sm"><?= $product ?>
                    (<?= $product->preu() ?>)</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="<?=  $product->getCodi() ?>" name="<?=  $product->getCodi() ?>" placeholder="Enter quantity">
                </div>
                <div class="col-sm-5"><img width="70px" height="70px" src="<?= $product->img() ?>"/></div>
            </div>
            <?php
        }
        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
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
<div class="col-lg-6 col-md-6">
    <form action="processAdress.php" method="post">
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label col-form-label-sm">Enter your Name:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control <?= classError($errors(),'name') ?>" id="name" name="name" value="<?= $name ?>"
                       placeholder="Enter your name">
                <?= showError($errors(),'name') ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label col-form-label-sm">Email:</label>
            <div class="col-sm-3">
                <input type="email" class="form-control <?= classError($errors(),'email') ?>" id="email" name="email" value="<?= $email ?>" placeholder="Enter your E-mail">
                <?= showError($errors(),'email') ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label col-form-label-sm">Address:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control <?= classError($errors(),'address') ?>" id="address" name="address" value="<?= $address ?>" placeholder="Enter your Address">
                <?= showError($errors(),'address') ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="postalCode" class="col-sm-3 col-form-label col-form-label-sm">Postal Code:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control <?= classError($errors(),'postalCode') ?>" id="postalCode" name="postalCode" value="<?= $postalCode ?>" placeholder="Enter your postal Code">
                <?= showError($errors($shipping),'postalCode') ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-sm-3 col-form-label col-form-label-sm">City:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control <?= classError($errors(),'city') ?>" id="city" name="city" value="<?= $city ?>" placeholder="Enter your City">
                <?= showError($errors(),'city') ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
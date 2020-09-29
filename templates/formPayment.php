<div class="col-lg-6 col-md-6">
    <form action="processPayment.php" method="post" enctype="multipart/form-data">
        <div class="form-control row">
            <div class="form-check form-check-inline">
                <input class="form-check-input <?= classError($errors(),'typeCard') ?>" type="radio" name="typeCard" id="inlineRadio1" value="visa" <?php if ($typeCard === 'visa') echo 'checked' ?>>
                <label class="form-check-label" for="inlineRadio1">Visa</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input <?= classError($errors(),'typeCard') ?>" type="radio" name="typeCard" id="inlineRadio2" value="mastercard" <?php if ($typeCard === 'mastercard') echo 'checked' ?>>
                <label class="form-check-label" for="inlineRadio2">Mastercard</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input <?= classError($errors(),'typeCard') ?>" type="radio" name="typeCard" id="inlineRadio3" value="maestro" <?php if ($typeCard === 'maestro') echo 'checked' ?>>
                <label class="form-check-label" for="inlineRadio3">Maestro</label>
                <?= showError($errors(),'typeCard') ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label col-form-label-sm">Enter the CardHolder's Name:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control <?= classError($errors(),'name') ?>" id="name" name="name" placeholder="Enter your name" value="<?= $name ?>">
                <?= showError($errors(),'name') ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="cardNumber" class="col-sm-3 col-form-label col-form-label-sm">Enter your Credit Card Number:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control <?= classError($errors(),'cardNumber') ?>" id="cardNumber" name="cardNumber" placeholder="Enter your creditCard Number" value="<?= $cardNumber ?>">
                <?= showError($errors(),'cardNumber') ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="expirationDate" class="col-sm-3 col-form-label col-form-label-sm">Enter Credit's Card expiration Date:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control <?= classError($errors(),'expirationDate') ?>" id="expirationDate" name="expirationDate" placeholder="Enter Credit's Card expiration Date" value="<?= $expirationDate ?>">
                <?= showError($errors(),'expirationDate') ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="securityCode" class="col-sm-3 col-form-label col-form-label-sm">Enter Security Code:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control <?= classError($errors(),'securityCode') ?>" id="securityCode" name="securityCode" placeholder="Enter Your Security Code" value="<?= $securityCode ?>">
                <?= showError($errors(),'securityCode') ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="input-group col-sm-6">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="dni" id="customFile">
                    <label class="custom-file-label " for="customFile">DNI picture</label>
                </div>
                <div class="input-group-append">
                    <button class="btn btn-outline-danger" type="button"><?= $errors()['dnis']?></button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
session_start();
include_once dirname(__FILE__) . '/../config/config.php';
require_once('../templates/header.php');
$errors = function() use ($shipping){
    $phpFileUploadErrors = array(
        0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk.',
        8 => 'A PHP extension stopped the file upload.',
    );
    $errors = array();
    extract($_POST);
    if (empty($typeCard)){
        $errors['typeCard'] = "Field TypeCard is required";
    }
    if (empty($name)){
        $errors['name'] = "Field name is required";
    }
    if (empty($cardNumber) || strlen($cardNumber) != 12) {
        $errors['cardNumber'] = "Credit Card Number is required or is not correct";
    }

    if (empty($expirationDate) || date_create_from_format('m/y',$expirationDate) < new dateTime()) {
        $errors['expirationDate'] = "Expiration date must be in the future";
    }
    if (empty($securityCode) || strlen($securityCode) != 3 || !is_numeric($securityCode))  {
        $errors['securityCode'] = "Security Code must be 3 digits";
    }


    if (is_uploaded_file($_FILES['dni']['tmp_name'])){
        if ($_FILES['dni']['error'] > 0){
            $errors['dni'] = $phpFileUploadErrors[$_FILES['dni']['error']];
        } else {
            if ($_FILES['dni']['type'] !== 'image/jpeg'){
                $errors['dni'] = 'Type of file not supported '.$_FILES['dni']['type'];
            }
        }
    }
    else {
        $errors['dni'] = "Suspicious";
    }


    return $errors;
};
function showError($arrayErrors,$field){
     if (array_key_exists($field,$arrayErrors)) {
        return "<div id='nameFeedback' class='invalid-feedback'>".$arrayErrors[$field]."</div>";
     }
     return "";
}
function classError($arrayErrors,$field){
    return array_key_exists($field,$arrayErrors)?'is-invalid':'is-valid';
}
?>

    <div class="container" >
        <div class="row">

            <?php require_once ('../templates/category.php'); ?>
            <div class="col-lg-9">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && count($errors()) === 0 ) {
                    $destination = './dni/'.$_POST['cardNumber'].'.jpg';
                    if (!move_uploaded_file($_FILES['dni']['tmp_name'],$destination )) {
                        echo "Error copying file";
                    } else {
                        echo "File upload";
                        foreach ($_POST as $key => $value) {
                            echo "<p><b>" . ucfirst($key) . "</b> : " . htmlspecialchars($value) . "</p>";
                        }
                        echo "<img src='$destination' title='foto dni' width='320' height='240'/>";
                    }

                }
                else {
                    extract($_POST);
                ?>

            <div class="container" >
                <?php
                    $order = unserialize($_SESSION['order']);
                    $address = unserialize($_SESSION['address']);
                    $total = 0;
                    echo "<table>";
                    foreach ($products as $product){
                        $amount = $order[id($product)];
                        if (is_numeric($amount)){
                            $preuLinea = valorTotal($amount,$product);
                            $total += $preuLinea;
                            ?>
                            <tr><td><?= $amount ?></td><td><?= description($product) ?></td><td><?php printf("%.2f",$preuLinea); ?></td></tr>
                            <?php
                        }
                    }
                    printf("<tr><td>Total</td><td>%.2f</td></tr></table>",$total);
                    foreach ($address as $key => $value){
                        echo "<p><b>".ucfirst($key)."</b> : ".htmlspecialchars($value)."</p>";
                    }
                ?>
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
                                    <button class="btn btn-outline-danger" type="button"><?= $errors()['dni']?></button>
                                </div>
                            </div>
                        </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>
<?php
require_once ('../templates/footer.php');
?>

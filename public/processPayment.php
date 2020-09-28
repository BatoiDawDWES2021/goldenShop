<?php
session_start();
include_once dirname(__FILE__) . '/../config/config.php';
include_once dirname(__FILE__) . '/../config/exemptions.php';
require_once('../templates/header.php');
$errors = function() use ($shipping){
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

?>
    <div class="container" >
        <div class="row">
            <?php require_once ('../templates/category.php'); ?>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && count($errors()) === 0 ) {
                ?>
                    <div class="col-lg-6 col-md-6">
                <?php
                    try
                    {
                        $destination = './dnis/'.$_POST['cardNumber'].'.jpg';
                        if (!move_uploaded_file($_FILES['dni']['tmp_name'],$destination )){
                           throw new fileMovedException();
                        }
                       echo "File upload";
                       echo "<img src='$destination' title='foto dni' width='320' height='240'/>";
                    } catch (ErrorException $e){
                        echo "Error copying file";
                    } catch (fileMovedException $e){
                        echo "Error copying file";

                    } finally {
                        foreach ($_POST as $key => $value) {
                            echo "<p><b>" . ucfirst($key) . "</b> : " . htmlspecialchars($value) . "</p>";
                        }
                    }

                ?>
                    </div>
                <?php
                }  else {
                    extract($_POST);
                    include_once('../templates/formPayment.php');
                }
                ?>
                <div class="col-md-3 col-lg-3">
                    <?php
                        require_once('../templates/cartSumary.php');
                        require_once('../templates/addrSumary.php');
                    ?>
                </div>
        </div>
    </div>
<?php
require_once ('../templates/footer.php');
?>

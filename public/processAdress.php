<?php
include_once dirname(__FILE__) . '/../config/config.php';

$errors = function() use ($shipping){
    $errors = array();
    extract($_POST);
    if (count(explode(' ',$name))<2){
        $errors[] = "A name and a surname are necessary";
    }
    if (strlen($postalCode)!== 5) {
        $errors[] = "Postal Code must be 5 length";
    }
    $email_components = explode('@',$email);
    if ($email_components[1] != 'gmail.com'){
        $errors[] = 'Domain not available';
    }
    $province = substr($postalCode,0,2);
    if (!in_array($province,$shipping)){
        $errors[] = 'Postal Code not available for shipping';
    }
    return $errors;
};
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Process Adress</title>
</head>
<body style="margin: 20px;">
<?php

    if (isset($_POST['email'])){
        extract($_POST);
        if (count($errors())) {
            foreach ($errors() as $error) {
                echo "<p>$error</p>";
            }
        }
        else {
            $fin = true;
            foreach ($_POST as $key => $value){
                echo "<p><b>".ucfirst($key)."</b> : $value</p>";
            }
        }
    }

    if (!isset($fin)){
?>
    <div class="container" >
        <form action="processAdress.php" method="post">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label col-form-label-sm">Enter your Name:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $name ?>"
                           placeholder="Enter your name">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label col-form-label-sm">Email:</label>
                <div class="col-sm-3">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" placeholder="Enter your E-mail">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label col-form-label-sm">Address:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="address" name="address" value="<?= $address ?>" placeholder="Enter your Address">
                </div>
            </div>
            <div class="form-group row">
                <label for="postalCode" class="col-sm-3 col-form-label col-form-label-sm">Postal Code:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="postalCode" name="postalCode" value="<?= $postalCode ?>" placeholder="Enter your postal Code">
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-3 col-form-label col-form-label-sm">City:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="city" name="city" value="<?= $city ?>" placeholder="Enter your City">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php } ?>
</body>
</html>

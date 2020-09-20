<?php
session_start();
require_once('../templates/header.php');

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
<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php require_once ('../templates/category.php'); ?>
        <div class="col-lg-9">
            <div class="container" >
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
                echo "<p><b>".ucfirst($key)."</b> : ".htmlspecialchars($value)."</p>";
            }
            $_SESSION['address'] = serialize($_POST);
            echo '<p><a class="btn btn-primary" href="processPayment.php" role="button">Address Info</a>';
        }
    }

    if (!isset($fin)){
        $order = unserialize($_SESSION['order']);
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
        ?>
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
        </p>
    </div>
<?php } ?>
        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php
require_once ('../templates/footer.php');
?>


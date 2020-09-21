<?php
session_start();
require_once('../templates/header.php');

$errors = function() use ($shipping){
    $errors = array();
    extract($_POST);
    if (count(explode(' ',$name))<2){
        $errors['name'] = "A name and a surname are necessary";
    }
    if (strlen($postalCode)!== 5) {
        $errors['postalCode'] = "Postal Code must be 5 length";
    }
    $email_components = explode('@',$email);
    if ($email_components[1] != 'gmail.com'){
        $errors['email'] = 'Domain not available';
    }
    $province = substr($postalCode,0,2);
    if (!in_array($province,$shipping)){
        $errors['postalCode'] = 'Postal Code not available for shipping';
    }
    return $errors;
};

?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <?php
            require_once ('../templates/category.php');
            if ($_SERVER["REQUEST_METHOD"] == "POST" && count($errors($shipping)) === 0 ) {
                $_SESSION['address'] = serialize($_POST);
                require_once('../templates/shoppingCart.php');
            } else {
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    extract($_POST);
                } else {
                    if (isset($_SESSION['usuario'])) {
                        extract(unserialize($_SESSION['usuario']));
                    }
                }

                require_once('../templates/formAddress.php');
            }
        ?>
        <div class="col-md-3 col-lg-3">
            <?php
                require_once('../templates/cartSumary.php');
                require_once('../templates/addrSumary.php');
            ?>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<?php
require_once ('../templates/footer.php');
?>


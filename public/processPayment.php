<?php
include_once dirname(__FILE__) . '/../config/config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Process payment</title>
</head>
<body style="margin: 20px;">
    <div class="container" >
            <form action="processPayment.php" method="post" enctype="application/x-www-form-urlencoded">
                <div class="form-group row">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typeCard" id="inlineRadio1" value="visa">
                        <label class="form-check-label" for="inlineRadio1">Visa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typeCard" id="inlineRadio2" value="mastercard">
                        <label class="form-check-label" for="inlineRadio2">Mastercard</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typeCard" id="inlineRadio3" value="maestro">
                        <label class="form-check-label" for="inlineRadio3">Maestro</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label col-form-label-sm">Enter the CardHolder's Name:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cardNumber" class="col-sm-3 col-form-label col-form-label-sm">Enter your Credit Card Number:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Enter your creditCard Number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="expirationDate" class="col-sm-3 col-form-label col-form-label-sm">Enter Credit's Card expiration Date:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="expirationDate" name="expirationDate" placeholder="Enter Credit's Card expiration Date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="securityCode" class="col-sm-3 col-form-label col-form-label-sm">Enter Credit's Card expiration Date:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="securityCode" name="securityCode" placeholder="Enter Your Security Code">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="custom-file col-sm-3">
                        <input type="file" class="custom-file-input" name="dni" id="customFile">
                        <label class="custom-file-label" for="customFile">DNI picture</label>
                    </div>
                </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

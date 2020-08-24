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
    <title>Process Adress</title>
</head>
<body style="margin: 20px;">
    <div class="container" >
        <form action="processAdress.php" method="post">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label col-form-label-sm">Enter your Name:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label col-form-label-sm">Email:</label>
                <div class="col-sm-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your E-mail">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label col-form-label-sm">Address:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter your Address">
                </div>
            </div>
            <div class="form-group row">
                <label for="postalCode" class="col-sm-3 col-form-label col-form-label-sm">Postal Code:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Enter your postal Code">
                </div>
            </div>
            <div class="form-group row">
                <label for="postalCode" class="col-sm-3 col-form-label col-form-label-sm">City:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter your City">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

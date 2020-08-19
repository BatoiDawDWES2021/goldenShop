<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Order</title>
</head>
<body style="margin: 20px;">
<div class="container" >
    <form action="processOrder.php" method="post">
        <div class="form-group row">
            <label for="goldcointqty" class="col-sm-3 col-form-label col-form-label-sm">One OZ. Gold</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="goldcointqty" name="goldcointqty" placeholder="Enter quantity">
            </div>
        </div>
        <div class="form-group row">
            <label for="silvercointqty" class="col-sm-3 col-form-label col-form-label-sm">One OZ. Silver</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="silvercointqty" name="silvercointqty" placeholder="Enter quantity">
            </div>
        </div>
        <div class="form-group row">
            <label for="goldbarqty" class="col-sm-3 col-form-label col-form-label-sm">One Bar Gold 100gr.</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="goldbarqty" name="goldbarqty" placeholder="Enter quantity">

            </div>
        </div>
        <div class="form-group row">
            <label for="silverbarqty" class="col-sm-3 col-form-label col-form-label-sm">One Bar Silver 1000gr</label>
            <div class="col-sm-1">
                <input type="text" class="form-control" id="silverbarqty" name="silverbarqty" placeholder="Enter quantity">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

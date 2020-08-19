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
    <form action="processorder.php" method="post">
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
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>

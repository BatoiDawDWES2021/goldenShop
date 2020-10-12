<?php
    require_once('../templates/header.php');

    if( parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) {
        unset($_GET['filter']);
    }

    if (isset($_GET['filter'])) {
        $filter_products = Product::selectMetal($conn,$_GET['filter']);
    }
    else {
        $filter_products = $products;
    }




?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <?php require_once ('../templates/category.php'); ?>


      <div class="col-lg-9">

        <div class="row">
        <?php
             foreach ($filter_products as $product){
        ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="p"><img class="card-img-top" src="<?= $product->img() ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="processOrder.php"><?= $product ?></a>
                </h4>
                <h5>$<?= printf("%.1f",$product->preu()) ?></h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php
    require_once ('../templates/footer.php');
?>
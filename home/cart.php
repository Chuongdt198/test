<?php
require_once "./../connect.php";

// lấy id sản phẩm
$id = $_GET['id'];

$idProductQuery = "SELECT * FROM products WHERE id = ?";
$stmt = $connect->prepare($idProductQuery);
$stmt->execute([$id]);
// Lấy dữ liệu từ csdl và gán cho 1 biến
$productId = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Cart</title>
</head>
<style>
    .container{
        padding: 3rem;
    }
</style>
<body>
    <!--Section: Block Content-->
<div class="container">
<section>
<h2 class="">Cart</h2>
<hr>
<!--Grid row-->
<div class="row">
  <!--Grid column-->
    <div class="col">

    <!-- Card -->
    <?php foreach ($productId as $product) : ?>
        <div class="row">
        <div class="col-md-5">
            <img src="<?php echo $product['image'] ?>" style="max-height: 18rem" class="card-img-top" alt="...">
        </div>
        <div class="col-md-7">
            <h5>Tên: <?= $product['name']?></h5>
            <br>
            <p>Mô tả: <?= $product['description'] ?></p>
            <br>
            <p>Giá:
                <?php $price = $product['price'];
                $vnd = number_format($price, 0, ' ', ' ');
                echo $vnd . 'đ';
                ?>
            </p>
            <br>
            <br>
            <br>
            <br>
            <button type="button" class="btn btn-primary btn-block">Submit</button>
        </div>
        </div>
    <?php endforeach ?>
  </div>
  <!--Grid column-->
  <!-- <div class="col-lg-5">
    <div class="mb-3">

        <h5 class="mb-3">The total amount of</h5>

        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
            Temporary amount
            <span>$25.98</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
            Shipping
            <span>Gratis</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
            <div>
              <strong>The total amount of</strong>
              <strong>
                <p class="mb-0">(including VAT)</p>
              </strong>
            </div>
            <span><strong>$53.98</strong></span>
          </li>
        </ul>
        <button type="button" class="btn btn-primary btn-block">go to checkout</button>
      </div>
  </div> -->

</div>
<!-- Grid row -->

</section>
</div>
</body>
</html>
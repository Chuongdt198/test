<?php
session_start();

if (!$_SESSION['AUTH']) {
    header("Location:../login/login.php");
    die;
}
// kết nối CSDL
require_once "./../connect.php";

// lấy ra danh sách các sản phẩm trong csdl
$listProductQuery = "SELECT * FROM products";

// nạp cậu sql vào kết nối
$stmt = $connect->prepare($listProductQuery);
// thực thi câu lệnh
$stmt->execute();

// Lấy dữ liệu từ csdl và gán cho 1 biến
$productList = $stmt->fetchAll();
// echo '<pre/>';
// var_dump($productList);
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Home</title>
</head>
<style>
    .container{
        background: #e8e8e87d;
        padding: 2rem;
    }
    .list-new h1{
        border-bottom: 2px solid #888;
        max-width: 25%;
    }
    .list-new{
        background-color: #fff;
        padding: 1rem;
    }
    .card img{
        max-height: 8rem;
    }
</style>

<body>
    <div class="container">
        <h1>Hello: <?php echo $_SESSION['AUTH']['name'] ?></h1>
        <div class="form-group">
        <a href="../logout.php" class="btn btn-danger">Log out</a>
        </div>
        <div class="form-group list-new">
            <h1>Hàng Mới</h1>
            <div class="row">
            <?php foreach ($productList as $product) : ?>
                <div class="col-3">
                    <div class="name" style="font-size: 1.5rem; text-align: center; color: green;"><?php echo $product['name'] ?></div>
                    <div class="card">
                        <img src="<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Giá:
                        <?php 
                        $price = $product['price'];
                        $vnd = number_format($price, 0, ' ', ' ');
                        echo $vnd . 'đ';
                        ?>
                        </h5>
                        <p class="card-text">Mô tả: <?php echo $product['description'] ?></p>
                        <a href="cart.php?id=<?= $product['id'] ?>" class="btn btn-success">Cart</a>
                    </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
        <div class="form-group list-new">
            <h1>Hàng Cũ</h1>
            <div class="row">
            <?php foreach ($productList as $product) : ?>
                <div class="col-3">
                    <div class="name" style="font-size: 1.5rem; text-align: center; color: green;"><?php echo $product['name'] ?></div>
                    <div class="card">
                        <img src="<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Giá:
                        <?php 
                        $price = $product['price'];
                        $vnd = number_format($price, 0, ' ', ' ');
                        echo $vnd . 'đ';
                        ?>
                        </h5>
                        <p class="card-text">Mô tả:<?php echo $product['description'] ?></p>
                        <a href="cart.php?id=<?= $product['id'] ?>" class="btn btn-success">Cart</a>
                    </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</body>

</html>
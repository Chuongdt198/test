<?php
session_start();
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Products</title>
</head>
<body>
    <div class="container">
        <h1>Hello: <?php echo $_SESSION['AUTH']['name'] ?></h1>
        <div class="form-group">
        <a href="product.php" class="btn btn-primary">Product</a>
        <a href="listuser.php" class="btn btn-success">List User</a>
        <a href="../login/login.php" class="btn btn-danger">Log out</a>
        </div>
        <table class="table">
        <div class="form-group">
        <a href="create.php" class="btn btn-primary">Create Product</a>
        </div>
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Style</th>
            <th scope="col">image</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productList as $product): ?>
            <tr>
                <td><?php echo $product['id'] ?></td>
				<td><?php echo $product['name'] ?></td>
                <td>
                <?php 
                    $price = $product['price'];
                    $vnd = number_format($price, 0, ' ', ' ');
                    echo $vnd . 'đ';
                ?>
                </td>
                <td>
                <?php
                $style = $product['style'];
                switch ($style) {
                    case '1':
                        echo 'Hoa Hồng';
                        break;
                    case '2':
                        echo 'Hoa Lan';
                        break;
                    case '3':
                        echo 'Hoa Mai';
                        break;
                    case '4':
                        echo 'Hoa Đào';
                        break;
                    default:
                        break;
                }
                 echo $style ?>
                 </td>
                 
				<td>
                <img src="<?php echo $product['image'] ?>" width="60"></td>
				<td><?php echo $product['description'] ?></td>
                <td>
                <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="delete.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
        </table>
    </div>
</body>
</html>
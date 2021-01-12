<?php
// Kết nối CSDL
require_once "./../connect.php";

// Lấy id người dùng nhập vào
$id = $_GET['id'];
// var_dump($id);
// die;


// Lấy tất cả thông tin sản phẩm từ id 
$productByIdQuery = "SELECT * FROM products WHERE `id` = ?";

// nạp cậu sql vào kết nối
$stmt = $connect->prepare($productByIdQuery);
// thực thi câu lệnh
$stmt->execute([$id]);
// Lấy dữ liệu từ csdl và gán cho 1 biến
$menber = $stmt->fetch();
// echo "<pre/>";
// var_dump($menber['id']);
// die;
// var_dump($menber['style']);
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
    <title>Edit Menber</title>
</head>
<body>
    <div class="container">
        <h1>Create Product</h1>
    <form action="post_update.php?id=<?= $menber['id'] ?>" method="get">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Name</label>
        <input type="text" name="name" value="<?= $menber['name'] ?>" class="form-control" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
        <label>Price</label>
        <input type="text" name="price" value="<?= $menber['price'] ?>" class="form-control" placeholder="Price">
        </div>
    </div>
    <div class="form-group">
    <label>Style</label>
    <select name="style" class="form-control">
        <option selected>Choose...</option>
        <option <?php if($menber['style'] == "1"){ echo 'selected';}  ?> value="1">Hoa Hồng</option>
        <option <?php if($menber['style'] == "2"){ echo 'selected';}  ?> value="2">Hoa Lan</option>
        <option <?php if($menber['style'] == "3"){ echo 'selected';}  ?> value="3">Hoa Mai</option>
        <option <?php if($menber['style'] == "4"){ echo 'selected';}  ?> value="4">Hoa Đào</option>
    </select>
    </div>
    <div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="4"><?= $menber['description'] ?></textarea>
    </div>
    <div class="form-group">
    <label>Image</label>
    <input name="image" type="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>
</body>
</html>
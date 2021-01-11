<?php
// Kết nối CSDL
require_once "./../connect.php";

// Lấy id người dùng nhập vào
$id = $_GET['id'];

// Lấy tất cả thông tin menber từ id
$menberByIdQuery = "select * from menbers where id = $id";

// nạp cậu sql vào kết nối
$stmt = $connect->prepare($menberByIdQuery);
// thực thi câu lệnh
$stmt->execute();
// Lấy dữ liệu từ csdl và gán cho 1 biến
$menber = $stmt->fetch();
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
        <h1>Edit Menber</h1>
    <form action="post_update.php?id=<?php echo $menber['id'] ?>" method="get">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Name</label>
        <input type="name" value="<?= $menber['name'] ?>" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
        <label>Email</label>
        <input type="email" value="<?= $menber['email'] ?>" name="email" class="form-control" placeholder="Email">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
        <label>Phone</label>
        <input type="number" value="<?= $menber['phone'] ?>" name="phone" class="form-control" placeholder="Phone">
        </div>
        <div class="form-group col-md-3">
        <label>Date</label>
        <input type="date" value="<?= $menber['date'] ?>" name="date" class="form-control" placeholder="Date">
        </div>
        <div class="form-group col-md-6">
        <label>Password</label>
        <input type="password" value="<?= $menber['password'] ?>" name="password" class="form-control" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label >Address</label>
        <input type="text" value="<?= $menber['address'] ?>" name="address" class="form-control" placeholder="1234 Ha Noi">
    </div>
    <div class="form-group">
    <label>Role</label>
    <select name="role" class="form-control">
        <option <?php if($menber['role']== 1) echo "selected" ?> value="1">Male</option>
        <option <?php if($menber['role']== 2) echo "selected" ?> value="2">Female</option>
        <option <?php if($menber['role']== 3) echo "selected" ?> value="3">Other gender</option>
    </select>
    </div>
    <div class="form-group">
    <img src="<?php echo $menber['avatar'] ?>" width="100">
    <label>Avatar</label>
    <input type="file" name="avatar" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>
</body>
</html>
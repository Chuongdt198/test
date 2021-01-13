<?php

session_start();
// kết nối CSDL
require_once "./../connect.php";

// lấy ra danh sách các user trong csdl
$listUserQuery = "SELECT * FROM users";

// nạp cậu sql vào kết nối
$stmt = $connect->prepare($listUserQuery);
// thực thi câu lệnh
$stmt->execute();

// Lấy dữ liệu từ csdl và gán cho 1 biến
$userList = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <table class="table">
        <h1>Hello: <?php echo $_SESSION['AUTH']['name'] ?></h1>
        <div class="form-group">
            <a href="product.php" class="btn btn-primary">Product</a>
            <a href="listuser.php" class="btn btn-success">List User</a>
            <a href="../login/login.php" class="btn btn-danger">Log out</a>
        </div>
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Birthday</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Avatar</th>
            <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($userList as $user): ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
				<td><?php echo $user['name'] ?></td>
				<td><?php echo $user['email'] ?></td>
				<td><?php echo $user['phone'] ?></td>
				<td><?php echo $user['birthday'] ?></td>
				<td><?php echo $user['address'] ?></td>
				<td><?php echo $user['gender'] ?></td>
				<td><?php echo $user['avatar'] ?></td>
				<td><?php echo $user['role'] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
        </table>
    </div>
</body>
</html>
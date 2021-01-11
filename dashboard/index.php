<?php
// kết nối CSDL
require_once "./../connect.php";

// lấy ra danh sách các menber trong csdl
$listMenberQuery = "select * from menbers";

// nạp cậu sql vào kết nối
$stmt = $connect->prepare($listMenberQuery);
// thực thi câu lệnh
$stmt->execute();

// Lấy dữ liệu từ csdl và gán cho 1 biến
$menberList = $stmt->fetchAll();

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
        <a href='../login/login.php'>Logout</a>
        <table class="table">
        <div class="form-group">
        <a href="create.php" class="btn btn-success">Add Menber</a>
        </div>
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Birthday</th>
            <th scope="col">Address</th>
            <th scope="col">Role</th>
            <th scope="col">Avatar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($menberList as $menber): ?>
            <tr>
                <td><?php echo $menber['id'] ?></td>
				<td><?php echo $menber['name'] ?></td>
				<td><?php echo $menber['email'] ?></td>
				<td><?php echo $menber['phone'] ?></td>
				<td><?php echo $menber['date'] ?></td>
				<td><?php echo $menber['address'] ?></td>
				<td><?php echo $menber['role'] ?></td>
				<td><?php echo $menber['avatar'] ?></td>
                <td>
                <a href="edit.php?id=<?php echo $menber['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="delete.php?id=<?php echo $menber['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
        </table>
    </div>
</body>
</html>
<?php
// kết nối CSDL
require_once "./../connect.php";

// lấy dữ liệu ng dùng nhập vào

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$date = $_GET['date'];
$password = $_GET['password'];
$address = $_GET['address'];
$role = $_GET['role'];
// $avatar = $_FILES['avatar'];


// lưu vào csdl
$insertMenberQuery = "INSERT INTO menbers(`name`, `email`, `phone`, `date`, `password`, `address`, `role`) VALUE(?, ?, ?, ?, ?, ? ,?)";
$stmt = $connect->prepare($insertMenberQuery);
$stmt->execute([$name, $email, $phone, $date, $password, $address ,$role]);


// điều hướng
header("Location: ../dashboard/index.php");
?>
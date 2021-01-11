<?php
// kết nối CSDL
require_once "./../connect.php";

// lấy dữ liệu ng dùng nhập vào

$id = $_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$date = $_GET['date'];
$password = $_GET['password'];
$address = $_GET['address'];
$role = $_GET['role'];
// $avatar = $_FILES['avatar'];

// lưu vào csdl
$updateMenberQuery = "update menbers set (`name`, `email`, `phone`, `date`, `password`, `address`, `role`) VALUE(?, ?, ?, ?, ?, ? ,?)";
$updateMenberQuery .= " where id = $id";
$stmt = $connect->prepare($updateMenberQuery);
$stmt->execute([$name, $email, $phone, $date, $password, $address ,$role]);


// điều hướng
header("Location: ../dashboard/index.php");
?>

?>
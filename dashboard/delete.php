<?php 

// Kết nối CSDL
require_once "./../connect.php";

// lấy id cần xóa
$id = $_GET['id'];

// câu lệnh xóa
$deleteMenberQuery = "delete from menbers where id = $id";
$stmt = $connect->prepare($deleteMenberQuery);

$stmt->execute();

// điều hướng về trang chủ
header('location: index.php');

 ?>
<?php 

// Kết nối CSDL
require_once "./../connect.php";

// lấy id cần xóa
$id = $_GET['id'];

// câu lệnh xóa
$deleteProductQuery = "DELETE FROM products WHERE id = $id";
$stmt = $connect->prepare($deleteProductQuery);

$stmt->execute();

// điều hướng về trang chủ
header('location: product.php');

 ?>
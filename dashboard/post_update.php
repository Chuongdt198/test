<?php
// kết nối CSDL
require_once "./../connect.php";

// lấy dữ liệu ng dùng nhập vào

// $id = $_GET['id'];
// var_dump($id);
$name = $_GET['name'];
// var_dump($name);
// die;
$email = $_GET['price'];
$style = $_GET['style'];
$description = $_GET['description'];
// $avatar = $_FILES['avatar'];

// lưu vào csdl
$updateMenberQuery = "UPDATE products SET (`name`, `price`, `style`, `description`) VALUE(?, ?, ?, ?)";
$updateMenberQuery .= " where id = $id";

$stmt = $connect->prepare($updateMenberQuery);
$stmt->execute([$name, $email, $style, $description]);


// điều hướng
header("Location: ../dashboard/index.php");
?>

?>
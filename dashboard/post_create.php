<?php
// kết nối CSDL
require_once "./../connect.php";

// lấy dữ liệu ng dùng nhập vào

$name = $_POST['name'];
$price = $_POST['price'];
$style = $_POST['style'];
$description = $_POST['description'];
$file = $_FILES['image'];
$filename = "";
if($file['size'] > 0){
	$filename = "./../uploads/" . $file['name'];
	move_uploaded_file($file['tmp_name'], $filename);
}
// switch ($style) {
//     case '1':
//         echo 'Hoa Hồng';
//         break;
//     case '2':
//         echo 'Hoa Lan';
//         break;
//     case '3':
//         echo 'Hoa Mai';
//         break;
//     case '4':
//         echo 'Hoa Đào';
//         break;
//     default:
//         break;
// }
// var_dump($style);
// die;

// lưu vào csdl
$insertProductQuery = "INSERT INTO products(`name`, `price`, `style`, `description`, `image`) VALUE(?, ?, ?, ?, ?)";
$stmt = $connect->prepare($insertProductQuery);
$stmt->execute([$name, $price, $style, $description, $filename]);

// điều hướng
header("Location: ../dashboard/product.php");
?>
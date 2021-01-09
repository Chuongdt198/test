<?php

//Nhúng file kết nối với database
require_once "./connect.php";

// $error = array();
// $data = array();

// lấy dữ liệu người dùng nhập vào
$email = $_POST['email'];
$password = $_POST['password'];

// mã hóa mật khẩu
$password = md5($password);
// kiểm tra dữ liệu nhập vào đã đủ chưa
if (!$email || !$password) {
    echo "vui lòng nhập đầy đủ thông tin";
    exit;
}
// if (!$password){
//     echo 'Vui lòng nhập password';
//     exit;
// }
// kiểm tra email nhập vào có đúng định dạng không
// function isEmail($str){
//     return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
// }
// if (!isEmail($data['email'])){
//     $error['email'] = 'Email không đúng định dạng';
// }


// lưu thông tin
$insertUserQuery = "INSERT INTO users(`email`, `password`) VALUE(?, ?)";

$stmt = $connect->prepare($insertUserQuery);
$stmt->execute([$email, $password]);

// Thông báo đăng ký
header("Location: index.html");


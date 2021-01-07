<?php

//Nhúng file kết nối với database
include('connect.php');

// lấy dữ liệu người dùng nhập vào
$email = $_POST['email'];
$password = $_POST['password'];

// kiểm tra dữ liệu nhập vào đã đủ chưa

if (!$email || !$password) {
    echo "vui lòng nhập đầy đủ thông tin";
    exit;
}

// mã hóa mật khẩu

$password = md5($password);


// lưu thông tin
$sql = "
        INSERT INTO users(
        email,
        password
    )
        VALUE(
        '{$email}',
        '{$password}'
    )";
// Thông báo đăng ký

if(mysqli_query($connect, $sql)) {
    echo "Quá trình đăng ký thành công. <a href='sigup.html'>Về trang chủ</a>"; 
}
else{
    echo 'đăng ký thất bại';
}

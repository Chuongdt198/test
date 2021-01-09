<?php
session_start();
//Nhúng file kết nối với database
require_once "./../connect.php";

// $error = array();
// $data = array();

// lấy dữ liệu người dùng nhập vào
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


// thực hiện validate dữ liệu
$nameerr = "";
$emailerr = "";
$pwderr = "";

// kiểm tra rỗng
if(strlen($name) == 0){
	$nameerr = "Tên không được để trống";
}

// kiểm tra rỗng
if(strlen($email) == 0){
    $emailerr = "Email không được để trống";
}
// kiểm tra định dạng email
$regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
if(!preg_match($regex, $email)) { 
    $emailerr = "Email không đúng định dạng, vui lòng nhập lại"; 
} 

// kiểm tra rỗng
if(strlen($password) == 0){
	$pwderr = "Mật khẩu không được để trống";
}


if($nameerr != "" || $emailerr != "" || $pwdRrr != ""){
	header("location: register.php?nameerr=$nameerr&emailerr=$emailerr&pwderr=$pwderr");
	die;
}

// mã hóa mật khẩu
$password = md5($password);
// kiểm tra email người dùng nhập vào đã tồn tại chưa

$checkEmailQuery = "SELECT `email` FROM users WHERE `email` = ?";
$stmt = $connect->prepare($checkEmailQuery);
$stmt->execute([$email]);
$user = $stmt->fetch();

//kiểm tra user trong db nếu sai thì insert
if($user){
    echo 'Email đã tồn tại vui lòng nhập lại';
    exit;
}


// lưu thông tin
$insertUserQuery = "INSERT INTO users(`name`, `email`, `password`) VALUE(?, ?, ?)";
$stmt = $connect->prepare($insertUserQuery);
$stmt->execute([$name, $email, $password]);

// in thông tin user
$checkEmailQuery = "SELECT `name` FROM users WHERE `name` = ?";
$stmt = $connect->prepare($checkEmailQuery);
$stmt->execute([$name]);
$user = $stmt->fetch();
$_SESSION['AUTH'] = $user;

// Thông báo đăng ký
header("Location: ../home/index.php");


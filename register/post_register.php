<?php
session_start();
//Nhúng file kết nối với database
require_once "./../connect.php";

// $error = array();
// $data = array();

// lấy dữ liệu người dùng nhập vào
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$password = $_POST['password'];
$address = $_POST['address'];
$gender = $_POST['gender'];
// $avatar = $_FILES['avatar'];


// thực hiện validate dữ liệu
$nameerr = "";
$emailerr = "";
$phoneerr = "";
$birthdayerr = "";
$pwderr = "";
$adrerr = "";
$sexerr = "";
// kiểm tra rỗng
if(strlen($name) == 0){
	$nameerr = "Tên không được để trống";
}

// kiểm tra định dạng email
$regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
if(!preg_match($regex, $email)) { 
    $emailerr = "Email không đúng định dạng, vui lòng nhập lại"; 
} 
// kiểm tra rỗng
if(strlen($phone) == 0){
	$phoneerr = "Số điện thoại không được để trống";
}// kiểm tra rỗng
if(strlen($birthday) == 0){
	$birthdayerr = "Vui lòng chọn ngày sinh";
}
// kiểm tra rỗng
if(strlen($password) == 0){
	$pwderr = "Mật khẩu không được để trống";
}
// kiểm tra rỗng
if(strlen($address) == 0){
	$adrerr = "Địa chỉ không được để trống";
}


if($nameerr != "" || $emailerr != "" || $phoneerr != "" || $birthdayerr != "" || $pwderr != "" || $adrerr != ""){
	header("location: register.php?nameerr=$nameerr&emailerr=$emailerr&phoneerr=$phoneerr&birthdayerr=$birthdayerr&pwderr=$pwderr&adrerr=$adrerr");
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
$insertUserQuery = "INSERT INTO users(`name`, `email`, `phone`, `birthday`, `password`, `address`, `gender`) VALUE(?, ?, ?, ?, ? ,? ,?)";
$stmt = $connect->prepare($insertUserQuery);
$stmt->execute([$name, $email, $phone, $birthday, $password, $address, $gender]);

// in thông tin user
$checkEmailQuery = "SELECT `name` FROM users WHERE `name` = ?";
$stmt = $connect->prepare($checkEmailQuery);
$stmt->execute([$name]);
$user = $stmt->fetch();
$_SESSION['AUTH'] = $user;

// Thông báo đăng ký
header("Location: ../home/index.php");


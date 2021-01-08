<?php 
session_start();

require_once "./connect.php";
// xóa bỏ tài khoản đang đăng nhập
unset($_SESSION['AUTH']);

// lấy email và password từ form login gửi lên
$email = $_POST['email'];
$password = $_POST['password'];

// thực hiện validate dữ liệu
$emailerr = "";
$passworderr = "";

// kiểm tra rỗng
if(strlen($email) == 0){
    $emailerr = "Vui lòng nhập email";
}

// số lượng ký tự phải >= 6
if($emailerr == "" && strlen($email) < 6){
	$emailerr = "Không đúng định dạng email";
}

// // chỉ cho phép có 1 ký tự @
// $countSpecialChar = 0;
// for($i = 0; $i < strlen($formEmail); $i++){
// 	if($formEmail[$i] == "@"){
// 		$countSpecialChar ++;
// 	}
// }

// if($emailErr == "" && $countSpecialChar != 1){
// 	$emailErr = "Không đúng định dạng email (chỉ có 1 ký tự @)";
// }


// if(strlen($formPassword) == 0){
// 	$pwdErr = "Vui lòng nhập mật khẩu";
// }

// if($emailErr != "" || $pwdErr != ""){
// 	header("location: login.php?emailErr=$emailErr&pwdErr=$pwdErr");
// 	die;
// }


$selectUserQuery = "select *  from users  where email = ? and password = ?";
$stmt = $connect->prepare($selectUserQuery);
$stmt->execute([$email, $password]);
$user = $stmt->fetch();

if($user === false){
	header('location: sigin.html?msg=Sai thông tin tài khoản/mật khẩu');	
	die;
}

$_SESSION['AUTH'] = $user;

// điều hướng về trang dashboard
header('location: dashboard.php');


 ?>
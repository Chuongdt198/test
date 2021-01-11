<?php 
session_start();

require_once "./../connect.php";

// lấy email và password từ form login gửi lên
$email = $_POST['email'];
$password = $_POST['password'];

// thực hiện validate dữ liệu
$emailerr = "";
$pwderr = "";

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


if($emailerr != "" || $pwderr != ""){
	header("location: login.php?emailerr=$emailerr&pwderr=$pwderr");
	die;
}

// số lượng ký tự phải >= 6
// if($emailerr == "" && strlen($email) < 6){
// 	$emailerr = "Không đúng định dạng email";
// }

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




$selectUserQuery = "select *  from users  where email = ? and password = ?";
$stmt = $connect->prepare($selectUserQuery);
$stmt->execute([$email, $password]);
$user = $stmt->fetch();

if($user === false){
	header('location: login.php?msg=Sai thông tin tài khoản/mật khẩu');	
	die;
}

$_SESSION['AUTH'] = $user;

// điều hướng về trang chủ
header('location: ../dashboard/index.php');


 ?>
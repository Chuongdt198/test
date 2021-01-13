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

$selectUserQuery = "select *  from users  where email = ?";
$stmt = $connect->prepare($selectUserQuery);
$stmt->execute([$email]);
$user = $stmt->fetch();


//kiểm tra đăng nhập
if($user && $user['password'] == md5($password)){  //nếu user đang đăng nhập đúng(có trong csdl) và pwd = pwd đã mã hóa
	if ($user['role'] != 1) {	//kiểm tra nếu quyền khác 1 thì về trang home
		$_SESSION['AUTH'] = $user;
		header("Location:../home/home.php");
	}
	else{
		$_SESSION['AUTH'] = $user;
		header("Location:../dashboard/index.php");

	}
}
else{
	header('location: login.php?msg=Sai thông tin tài khoản/mật khẩu');	
	die;
}	
 ?>
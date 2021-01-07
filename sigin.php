<?php
session_start();
if (isset($_POST['sigin'])) {

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
    
    $password = md5($password);
    // kiểm tra dữ liệu nhập vào có tồn tại không
    
    // $sql = "
    //     SELECT email, password 
    //     FROM users
    //     WHERE 
    //         email = '$email',
    //         password = '$password' 
    // ";
    // var_dump($sql);
    
    $query = mysql("SELECT email, password FROM users WHERE email='$email'");
        if (mysql_num_rows($query) == 0) {
            echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
}
else{
    echo 'sai';
}

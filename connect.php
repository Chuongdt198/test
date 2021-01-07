<?php
//kết nối csdl vào php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "testphp";
// Kết nối database
$connect = new mysqli($hostname, $username, $password, $dbname);
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
}
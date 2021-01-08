<?php
//kết nối csdl vào php
$host = "localhost";
$dbname = "testphp";
$dbUsername = "root";
$dbPass = "";

$connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbUsername, $dbPass);
if(!$connect){
    echo 'kết nối không thành công';
    exit;
}
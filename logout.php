<?php 
session_start();
unset($_SESSION['AUTH']);
header("Location:login/login.php");

 ?>
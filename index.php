<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    Hello: <?php echo $_SESSION['AUTH']['name'] ?>
    <h1>Success</h1>
    <a href='./login/login.html'>Log out</a>
</body>
</html>
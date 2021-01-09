<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <form action="post_register.php" method="post">
        <div class="container">
            <div class="form-group">
                <h1>Register</h1>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" placeholder="Nguyễn Văn A">
                <?php if (isset($_GET['nameerr'])): ?>
                    <h5 style="font-size: 1em ; color: red; font-style: italic"><?php echo $_GET['nameerr'] ?></h5>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control" name="email" placeholder="example@gmail.com">
                <?php if (isset($_GET['emailerr'])): ?>
                    <h5 style="font-size: 1em ; color: red; font-style: italic"><?php echo $_GET['emailerr'] ?></h5>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" placeholder="******">
                <br>
                <?php if (isset($_GET['pwderr'])): ?>
                    <h5 style="font-size: 1em ; color: red; font-style: italic"><?php echo $_GET['pwderr'] ?></h5>
                <?php endif ?>
            </div>
            <div class="form-group">
                <a href="../login/login.php" class="btn btn-outline-danger">Login</a>
                <button class="btn btn-primary">Register</button>
            </div>
        </div>
    </form>
</body>

</html> 
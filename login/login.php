<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <form action="post_login.php" method="post">
        <div class="container">
            <div class="form-group">
                <h1>Login</h1>
                <?php if (isset($_GET['msg'])): ?>
                    <h4 style="color: red; font-style: italic"><?php echo $_GET['msg'] ?></h4>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control" name="email" placeholder="example@">
                <?php if (isset($_GET['emailerr'])): ?>
                    <h5 style="font-size: 1em ; color: red; font-style: italic"><?php echo $_GET['emailerr'] ?></h5>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password">
                <?php if (isset($_GET['pwderr'])): ?>
                    <h4 style="font-size: 1em ; color: red; font-style: italic"><?php echo $_GET['pwderr'] ?></h4>
                <?php endif ?>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="clickCheck">
                <label class="form-check-label" for="clickCheck">Remember me</label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Login</button>
                <a href="../register/register.php" class="btn btn-outline-danger">Register</a>
                <a href="#" class="btn btn-outline-success">Fogot password</a>
            </div>
        </div>
    </form>
</body>

</html>
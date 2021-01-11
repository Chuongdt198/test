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
    <div class="container">
        <h1>Register</h1>
    <form action="post_register.php" method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Name</label>
        <input type="name" name="name" class="form-control" placeholder="Name">
        <?php if (isset($_GET['nameerr'])): ?>
            <h5 style="font-size: 1em ; color: red; font-style: italic"><?php echo $_GET['nameerr'] ?></h5>
        <?php endif ?>
        </div>
        <div class="form-group col-md-6">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email">
        <?php if (isset($_GET['emailerr'])): ?>
            <h5 style="font-size: 1em ; color: red; font-style: italic"><?php echo $_GET['emailerr'] ?></h5>
        <?php endif ?>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
        <label>Phone</label>
        <input type="number" name="phone" class="form-control" placeholder="Phone">
        </div>
        <div class="form-group col-md-3">
        <label>Birthday</label>
        <input type="date" name="birthday" class="form-control" placeholder="Birthday">
        </div>
        <div class="form-group col-md-6">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <?php if (isset($_GET['pwderr'])): ?>
            <h5 style="font-size: 1em ; color: red; font-style: italic"><?php echo $_GET['pwderr'] ?></h5>
        <?php endif ?>
        </div>
    </div>
    <div class="form-group">
        <label >Address</label>
        <input type="text" name="address" class="form-control" placeholder="Ha Noi">
    </div>
    <div class="form-group">
    <label>Gender</label>
    <select name="gender" class="form-control">
        <option value="1">Male</option>
        <option value="2">Female</option>
        <option value="3">Other gender</option>
    </select>
    </div>
    <div class="form-group">
    <label>Avatar</label>
    <input type="file" class="form-control">
    </div>  
    <div class="form-group">
        <a href="../login/login.php" class="btn btn-outline-danger">Login</a>
        <button class="btn btn-primary">Register</button>
    </div>
    </form>
    </div>
</body>

</html> 
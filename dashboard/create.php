<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Create Menber</title>
</head>
<body>
    <div class="container">
        <h1>Create Menber</h1>
    <form action="post_create.php" method="get">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Name</label>
        <input type="name" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
        <label>Phone</label>
        <input type="number" name="phone" class="form-control" placeholder="Phone">
        </div>
        <div class="form-group col-md-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" placeholder="Date">
        </div>
        <div class="form-group col-md-6">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label >Address</label>
        <input type="text" name="address" class="form-control" placeholder="1234 Ha Noi">
    </div>
    <div class="form-group">
    <label>Role</label>
    <select name="role" class="form-control">
        <option value="1">Male</option>
        <option value="2">Female</option>
        <option value="3">Other gender</option>
    </select>
    </div>
    <div class="form-group">
    <label>Avatar</label>
    <input type="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>
</body>
</html>
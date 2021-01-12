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
        <h1>Create Product</h1>
    <form action="post_create.php" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
        <label>Price</label>
        <input type="text" name="price" class="form-control" placeholder="Price">
        </div>
    </div>
    <div class="form-group">
    <label>Style</label>
    <select name="style" class="form-control">
        <option selected>Choose...</option>
        <option value="1">Hoa Hồng</option>
        <option value="2">Hoa Lan</option>
        <option value="3">Hoa Mai</option>
        <option value="4">Hoa Đào</option>
    </select>
    </div>
    <div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="4"></textarea>
    </div>
    <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>
</body>
</html>
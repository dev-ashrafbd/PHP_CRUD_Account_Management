<?php include "Config/config.php";?>
<?php
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $query = "SELECT * FROM user WHERE id=$id";
    $fire = mysqli_query($con, $query) or die("Cannot update Data" . mysqli_error($con));
    $user = mysqli_fetch_assoc($fire);
}
?>
<?php
if (isset($_POST['update'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "UPDATE user SET fullname ='$fullname',email='$email',username='$username', password='$password' WHERE id=$id";
    $fire = mysqli_query($con, $query) or die("Cannot update Data" . mysqli_error($con));
    if ($fire) {
        header("Location:index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Document</title>
<body>
<div class="container">
<div class="row">
<div class="col-lg-12 d-flex">
<div class="col-lg-6 px-5">
<h3>Update Data</h3>
<hr>
<form name="signup" id="signup" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
    <div class="form-group">
        <label for="fullname">Full Name</label>
        <input value="<?php echo $user['fullname'] ?>" name="fullname" id="fullname" type="text" class="form-control" placeholder="Full Name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input value="<?php echo $user['email'] ?>" name="email" id="email" type="text" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input value="<?php echo $user['username'] ?>" name="username" id="username" type="text" class="form-control" placeholder="Username" required>
    </div>
    <div class="form-group">
        <label for="password">New Password</label>
        <input name="password" id="password" type="Password" class="form-control" placeholder=" New Password" required>
    </div>
    <br>
    <div class="form-group">
       <button name="update" id="update" class="btn btn-primary btn-block">Update</button>
    </div>
</form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>

</body>
</html>
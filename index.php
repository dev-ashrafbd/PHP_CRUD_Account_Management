<?php include "Config/config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <title>Document</title>
<body>
<div class="jumbotron jumbotron-fluid bg-dark">
    <div class="container text-center">
        <h1 class="display-3 py-5 text-white">Account Management</h1>
    </div>
</div>
<div class="container">
<div class="row pt-4">
<div class="col-lg-12 d-flex">
<div class="col-lg-6">
<h3>User Data</h3>
<hr>
<table id="data"  class="display">
        <thead>
          <tr>
            <th scope='col'>Full Name</th>
            <th scope='col'>Email</th>
            <th scope='col'>Username</th>
            <th>Delete</th>
            <th>Update</th>
          </tr>
        </thead>
        <tbody>

<!-- Show data in table -->
          <?php
$query = "SELECT * FROM user";
$fire = mysqli_query($con, $query) or die("Cannot fetch data from Database" . mysqli_errno($con));
// if ($fire) {
//     echo "We got data from Database";
// }
if (mysqli_num_rows($fire) > 0) {

    while ($name = mysqli_fetch_assoc($fire)) {?>

            <tr>
                <th scope="row"><?php echo $name['fullname'] ?></th>
                <td><?php echo $name['email'] ?></td>
                <td><?php echo $name['username'] ?></td>

                <td><a href="delete.php?del=<?php echo $name['id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
                <td><a href="update.php?update=<?php echo $name['id'] ?>" class="btn btn-sm btn-primary">Update</a></td>
            </tr>
        <?php
}
} else {?>
    <tr class="text-center">
        <td colspan="5">
            <h2>No Data Here to Show</h2>
        </td>
    </tr>
    <?php
}
?>
        </tbody>
      </table>
</div>
<!-- Sign up Form -->
<div class="col-lg-6 px-5">
<h3>Sign Up</h3>
<hr>
<?php
if (isset($_GET['msg'])) {

    echo '<div class="alert alert-primary" role="alert">' .
        $_GET['msg'] . '</div>';
}
?>
<form name="signup" id="signup" action="Config/action.php" method="POST">
    <div class="form-group">
        <label for="fullname">Full Name</label>
        <input name="fullname" id="fullname" type="text" class="form-control" placeholder="Full Name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" id="email" type="text" class="form-control" placeholder="Email" required >
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input name="username" id="username" type="text" class="form-control" placeholder="Username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" id="password" type="Password" class="form-control" placeholder="Password" required>
    </div>
    <br>
    <div class="form-group">
       <button name="submit" id="submit" class="btn btn-primary btn-block">Sign Up</button>
    </div>
</form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.jqueryui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script>
$(document).ready( function () {
    $('#data').DataTable();
} );
</script>
</body>
</html>
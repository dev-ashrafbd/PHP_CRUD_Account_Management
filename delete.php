<?php include "Config/config.php";?>

<?php

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $query = "DELETE FROM user WHERE id=$id";
    $fire = mysqli_query($con, $query) or die("Cannot Delete data" . mysqli_error($con));
    if ($fire) {
        header("Location:index.php");
    }
}

?>

<?php include "config.php";?>
<?php
if ((isset($_POST['submit']))) {
    $fullname = mysqli_real_escape_string($con, trim($_POST['fullname']));
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $username = mysqli_real_escape_string($con, trim($_POST['username']));
    $password = mysqli_real_escape_string($con, trim($_POST['password']));

    // validate data
    //Validate Fullname

    $fullname_valid = $email_valid = $username_valid = $password_valid = false;
    if (!empty($fullname)) {
        if (strlen($fullname) > 2 && strlen($fullname) >= 30) {
            if (preg_match('/[^a-zA-Z\s]/', $fullname)) {
                $fullname_valid = true;
                echo "Full name is OK!! <br>";
            } else {echo "Full name contain only Alphabets!! <br>";}
        } else {echo "Full name must between 2 to 33 chars only!! <br>";}
    } else {echo "Full name cannot be Blank!! <br>";}

    // Validate Email

    if (!empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_valid = true;
            echo "Email is OK!! <br>";
        } else {echo $email . "is an invalid email address <br>";}
    } else {echo "Email cannot be Blank!! <br>";}

    // Validate Username
    if (!empty($username)) {
        if (strlen($username) > 4 && strlen($username) >= 15) {
            if (preg_match("/^[a-zA-z]", $username)) {
                $username_valid = true;
                echo "Username is OK!! <br>";
            } else {echo "Username can contain Alphabets,digit,underscore ,'_' period '.' symbols!! <br>";}
        } else {echo "Username must between 4 to 15 chars only!! <br>";}
    } else {echo "Username cannot be Blank!! <br>";}

    // Check Password

    if (!empty($password)) {
        if (strlen($password) > 5 && strlen($password) >= 15) {
            $password_valid = true;
            $password = md5($password);
            echo "Password is OK!! <br>";
        } else {echo "Password must between 4 to 15 chars!! <br>";}
    } else {echo "Password cannot be Blank!! <br>";}

    if ($fullname_valid && $email_valid && $username_valid && $password_valid) {

        $query = "INSERT INTO  user(fullname,email,username,password) VALUES('$fullname','$email','$username','$password')";

        $fire = mysqli_query($con, $query) or die("Cannot data inset in database." . mysqli_errno($con));
        if ($fire) {
            header("Location:../index.php");
            //Wait 3 sec & then redirect
            //header("Refresh: 3; URL=../index.php");
        }
    }

}

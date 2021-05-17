<?php include "config.php";?>
<?php
if (isset($_POST['submit'])) {
    $msg = "";
    $fullname = mysqli_real_escape_string($con, trim($_POST['fullname']));
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $username = mysqli_real_escape_string($con, trim($_POST['username']));
    $password = mysqli_real_escape_string($con, trim($_POST['password']));
    // validate data
    //Validate Fullname

    $fullname_valid = $email_valid = $username_valid = $password_valid = false;
    if (!empty($fullname)) {
        if (strlen($fullname) > 2 && strlen($fullname) <= 30) {
            if (preg_match('/^[a-zA-Z\s]/', $fullname)) {
                $fullname_valid = true;
            } else { $msg .= "Full name contain only Alphabets!! <br>";}
        } else { $msg .= "Full name must between 2 to 33 chars only!! <br>";}
    } else { $msg .= "Full name cannot be Blank!! <br>";}

    // Validate Email

    if (!empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_valid = true;
        } else { $msg .= $email . "is an invalid email address <br>";}
    } else { $msg .= "Email cannot be Blank!! <br>";}

    // Validate Username
    if (!empty($username)) {
        if (strlen($username) > 4 && strlen($username) <= 15) {
            if (preg_match('/^[a-zA-z\d_.]/', $username)) {
                $query = "SELECT username FROM user WHERE username ='$username' ";
                $fire = mysqli_query($con, $query) or die("Cannot data inset in database." . mysqli_errno($con));
                if (mysqli_num_rows($fire) > 0) {
                    $msg .= "Username is not available.Try another!!";
                } else {
                    $username_valid = true;
                }
            } else { $msg .= "Username can contain Alphabets,digit,underscore ,'_' period '.' symbols!! <br>";}
        } else { $msg .= "Username must between 4 to 15 chars only!! <br>";}
    } else { $msg .= "Username cannot be Blank!! <br>";}

    // Check Password

    if (!empty($password)) {
        if (strlen($password) > 5 && strlen($password) <= 15) {
            $password_valid = true;
            $password = md5($password);
        } else { $msg .= "Password must between 4 to 15 chars!! <br>";}
    } else { $msg .= "Password cannot be Blank!! <br>";}

    if ($fullname_valid && $email_valid && $username_valid && $password_valid) {

        $query = "INSERT INTO  user(fullname,email,username,password) VALUES('$fullname','$email','$username','$password')";

        $fire = mysqli_query($con, $query) or die($msg .= "Cannot data insert in database." . mysqli_error($con));
        if ($fire) {
            $msg = "Data Submit Successfully";
            header("Location:../index.php?msg=" . $msg);
            //Wait 3 sec & then redirect
            //header("Refresh: 3; URL=../index.php");
        }
    } else {
        header("Location:../index.php?msg=" . $msg);
    }

}

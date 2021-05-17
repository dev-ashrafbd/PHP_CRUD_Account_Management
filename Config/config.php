<?php
//mysqli_connect("Server Name", "Username", "Password", "Database Name")
$con = mysqli_connect("localhost", "root", "", "crud") or die("Can't connect successfully." . mysqli_connect_error());

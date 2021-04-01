<?php

//hardcoded admin login
$admin_user = "admin";
$admin_pass = "pass";

//hardcoded client login
$client_user = "client";
$client_pass = "pass";

//checking if user has submitted form
if (isset($_POST['submit'])) {

    $user_input = $_POST['username']; //getting user input
    $pass_input = $_POST['password']; //getting password input

    //checking user inputs against ADMIN login
    if ($admin_user == $user_input) {
        if ($admin_pass == $pass_input) {
            //if both fields are correct - send user here
            header("Location: pages/admin-tickets.php");
        }
        echo "Login is not correct"; //username correct, password incorrect
        die();
    }
    //checking user inputs against CLIENT login
    else if ($client_user == $user_input) {
        if ($client_pass == $pass_input) {
            //if both fields are correct - send user here
            header("Location: pages/user-tickets.php");
        }
        echo "Login is not correct"; //username correct, password incorrect
        die();
    } else {
        echo "Login is not correct";
        die();
    }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">

</head>

<body>

    <div class="login-form">

        <h1> Login </h1>
        <form action="" method="post">
            <label for="user">User</label>
            <input type="text" name="username" required />
            <label for="password">Password</label>
            <input type="password" name="password" required />
            <input type="submit" name="submit" value="Sign In" id="submit" />
        </form>

    </div>


</body>

</html>
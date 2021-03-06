<?php
session_start();
//loading xml file with logins
$xml = simplexml_load_file("./xml/users.xml");

//if loop when user submits, validating usernames against xml file
if (isset($_POST['submit'])) {
    //preventing malicious logins
    $username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
    //need to put password through hash
    $password = $_POST['password'];

    //if the user provides correct client credentials, send them to user page.
    //if user provides correct admin credentials, send them to admin page
    foreach ($xml->user as $user) {
        if ($username == $user->username && $password == $user->password) {
            if ($user->usertype == "Client") {
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $user->userid->__toString();
                header('location: pages/user-tickets.php');
                die;
            } else if ($user->usertype == "Admin") {
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $user->userid->__toString();
                header('location: pages/admin-tickets.php');
                die;
            }
        }
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
        <form method="post" action="">
            <label for="user">User</label>
            <input type="text" name="username" required />
            <label for="password">Password</label>
            <input type="password" name="password" required />
            <input type="submit" name="submit" value="Sign In" id="submitBtn" />
        </form>

    </div>


</body>

</html>
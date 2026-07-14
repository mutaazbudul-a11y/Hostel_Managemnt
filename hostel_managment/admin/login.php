<?php
session_start();
include("../config/db.php");

if(isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin
            WHERE username='$username'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['admin'] = $username;

        header("Location: dashboard.php");
        exit();

    }else{
        echo "Invalid Username or Password";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../asset/login.css">
</head>
<body>

<div class="login-box">
    <img src="../asset/image/p.webp" class="logo">

   

    <form method="POST">
        <input type="text" name="username" placeholder="Username">

        <input type="password" name="password" placeholder="Password">

        <button type="submit">Login</button>
    </form>
</div>
</body>
</html
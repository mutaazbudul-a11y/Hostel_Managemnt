<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("config/db.php");

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    // Admin Login
    $admin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($admin) > 0) {

        $row = mysqli_fetch_assoc($admin);

        $_SESSION['admin'] = $row['id'];

        header("Location: admin/dashboard.php");
        exit();
    }

    // Student Login
    $student = mysqli_query($conn, "SELECT * FROM student WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($student) > 0) {

        $row = mysqli_fetch_assoc($student);

        $_SESSION['id'] = $row['id'];

        header("Location: user/dashboard.php");
        exit();
    }

    $error = "Invalid Username or Password";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Hostel Management Login</title>

<meta charset="UTF-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

margin:0;
padding:0;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
font-family:Arial,Helvetica,sans-serif;
background:linear-gradient(135deg,#0d6efd,#20c997);

}

.card{

width:420px;
border:none;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,.2);

}

h2{

text-align:center;
margin-bottom:30px;

}

.btn-success{

height:50px;
font-size:18px;

}

</style>

</head>

<body>

<div class="card">

<div class="card-body p-4">

<h2>Hostel Management Login</h2>

<?php
if($error!=""){
echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form action="" method="POST">

<div class="mb-3">

<label class="form-label">Username</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
type="submit"
name="login"
value="1"
class="btn btn-success w-100">

Login

</button>

</form>

</div>

</div>

</body>
</html>
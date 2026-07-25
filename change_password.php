<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
    exit();
}

$id = $_SESSION['id'];


if(isset($_POST['change'])){

    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];


    $query = mysqli_query($conn,
    "SELECT * FROM student WHERE id='$id'");

    $student = mysqli_fetch_assoc($query);


    if($old_password != $student['password']){

        $error="Old password is incorrect";

    }elseif($new_password != $confirm_password){

        $error="New password does not match";

    }else{

        mysqli_query($conn,
        "UPDATE student SET password='$new_password' WHERE id='$id'"
        );

        $success="Password changed successfully";
    }

}

?>


<!DOCTYPE html>
<html>
<head>
<style>
body{
    margin:0;
    padding:0;
    font-family:Arial, Helvetica, sans-serif;
    background:linear-gradient(135deg,#198754,#0dcaf0);
}

.container{
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.card{
    width:420px;
    background:#fff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 25px rgba(0,0,0,.2);
}

.card h2{
    text-align:center;
    color:#198754;
    margin-bottom:25px;
}

.input-group{
    margin-bottom:18px;
}

.input-group label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
    color:#444;
}

.input-group input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:10px;
    font-size:15px;
    box-sizing:border-box;
}

.input-group input:focus{
    border-color:#198754;
    outline:none;
    box-shadow:0 0 8px rgba(25,135,84,.3);
}

.btn{
    width:100%;
    padding:13px;
    border:none;
    border-radius:10px;
    background:#198754;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    background:#146c43;
}

.success{
    background:#d1e7dd;
    color:#0f5132;
    padding:10px;
    border-radius:8px;
    margin-bottom:15px;
    text-align:center;
}

.error{
    background:#f8d7da;
    color:#842029;
    padding:10px;
    border-radius:8px;
    margin-bottom:15px;
    text-align:center;
}

.back{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    color:#198754;
    font-weight:bold;
}
</style>
</head>

<body>



<?php

if(isset($error)){
echo "<p style='color:red'>$error</p>";
}

if(isset($success)){
echo "<p style='color:green'>$success</p>";
}

?>

<div class="container">

<div class="card">

<h2>🔐 Change Password</h2>

<?php
if(isset($error)){
    echo "<div class='error'>$error</div>";
}

if(isset($success)){
    echo "<div class='success'>$success</div>";
}
?>

<form method="POST">

<div class="input-group">
<label>Old Password</label>
<input type="password" name="old_password" required>
</div>

<div class="input-group">
<label>New Password</label>
<input type="password" name="new_password" required>
</div>

<div class="input-group">
<label>Confirm Password</label>
<input type="password" name="confirm_password" required>
</div>

<button type="submit" name="change" class="btn">
🔒 Change Password
</button>

<a href="dashboard.php" class="back">
⬅ Back to Dashboard
</a>

</form>

</div>

</div>


</body>
</html>
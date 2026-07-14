<?php


if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>

<style>

body{
    margin:0;
    padding:0;
    font-family:Arial,sans-serif;
    background:#f4f6f9;
}

.container{
    width:90%;
    margin:40px auto;
}

h2{
    text-align:center;
    color:#2c3e50;
    margin-bottom:40px;
}

.report-box{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:30px;
}

.card{
    width:230px;
    background:#fff;
    border-radius:12px;
    padding:30px;
    text-align:center;
    box-shadow:0 4px 10px rgba(0,0,0,.15);
}

.card h3{
    color:#333;
    margin-bottom:20px;
}

.card a{
    display:inline-block;
    text-decoration:none;
    background:#3498db;
    color:#fff;
    padding:10px 20px;
    border-radius:6px;
}

.card a:hover{
    background:#2980b9;
}

.back{
    text-align:center;
    margin-top:40px;
}

.back a{
    text-decoration:none;
    background:#27ae60;
    color:white;
    padding:12px 25px;
    border-radius:6px;
}

.back a:hover{
    background:#219150;
}

</style>

</head>

<body>




<div class="container">

<h2>Reports Dashboard</h2>

<div class="report-box">

<div class="card">
<h3>Student Report</h3>
<a href="students.php">Open</a>
</div>

<div class="card">
<h3>Room Report</h3>
<a href="rooms.php">Open</a>
</div>

<div class="card">
<h3>Payment Report</h3>
<a href="payments.php">Open</a>
</div>

<div class="card">
<h3>Allocation Report</h3>
<a href="allocations.php">Open</a>
</div>

</div>

<div class="back">
<a href="../admin/dashboard.php">Back Dashboard</a>
</div>

</div>

</body>
</html>
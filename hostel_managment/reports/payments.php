<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}

include("../config/db.php");

$result = mysqli_query($conn,"SELECT * FROM payments");

?>

<!DOCTYPE html>
<html>
<head>

<title>Payment Report</title>

<style>

body{
    font-family:Arial, sans-serif;
    background:#f4f6f9;
    padding:30px;
}

.container{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    color:#2c3e50;
}

.top{
    display:flex;
    justify-content:space-between;
    margin-bottom:20px;
}

button{
    background:#3498db;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#217dbb;
}

a{
    background:#2ecc71;
    color:white;
    padding:10px 18px;
    text-decoration:none;
    border-radius:6px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#34495e;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #6c5f8f;
}

tr:hover{
    background:#f1f1f1;
}


@media print{
    button,a{
        display:none;
    }
}

</style>

</head>


<body>


<div class="container">


<h2>Payment Report</h2>


<div class="top">

<button onclick="window.print()">Print Report</button>

<a href="../admin/dashboard.php">Back Dashboard</a>

</div>


<table>

<tr>
<th>ID</th>
<th>Student ID</th>
<th>Amount</th>
<th>Payment Date</th>
<th>Status</th>
</tr>


<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['studentid']; ?></td>

<td>$<?php echo $row['amount']; ?></td>

<td><?php echo $row['payment_date']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>


<?php
}

?>


</table>


</div>


</body>
</html>
<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
    exit();
}

include("../config/db.php");

$id = $_SESSION['id'];

$sql = mysqli_query($conn,"
SELECT *
FROM payments
WHERE studentid='$id'
ORDER BY payment_date DESC
");

include("../includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Payments</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#eef3f8;
}

.card{
    border:none;
    border-radius:20px;
}

.card-header{
    background:linear-gradient(135deg,#dc3545,#fd7e14);
    color:white;
    padding:20px;
}

.table th{
    background:#f8f9fa;
}

.badge{
    font-size:14px;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header">

<h3>My Payments</h3>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>#</th>
<th>Amount</th>

<th>Date</th>
<th>Status</th>

</tr>

</thead>

<tbody>

<?php

$i=1;

while($row=mysqli_fetch_assoc($sql))
{

?>

<tr>

<td><?php echo $i++; ?></td>

<td>$<?php echo $row['amount']; ?></td>



<td><?php echo $row['payment_date']; ?></td>

<td>

<?php

if($row['status']=="Paid"){

echo "<span class='badge bg-success'>Paid</span>";

}else{

echo "<span class='badge bg-danger'>Pending</span>";

}

?>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

<div class="text-end">

<a href="dashboard.php" class="btn btn-primary">

Back Dashboard

</a>

</div>

</div>

</div>

</div>

</body>

</html>
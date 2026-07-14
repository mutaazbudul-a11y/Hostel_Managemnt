<?php
include("../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Payment</title>
</head>
<body>

<h2>Search Payment</h2>

<form method="GET">

<input type="text" name="search" placeholder="Enter Student Name" required>

<input type="submit" value="Search">

</form>

<br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Student Name</th>
    <th>Amount</th>
    <th>Payment Date</th>
    <th>Status</th>
</tr>

<?php

if(isset($_GET['search'])){

$search = $_GET['search'];

$sql = "SELECT payments.id,
               student.fullname,
               payments.amount,
               payments.payment_date,
               payments.status
        FROM payments
        JOIN student
        ON payments.studentid = student.id
        WHERE student.fullname LIKE '%$search%'";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['amount']; ?></td>

<td><?php echo $row['payment_date']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php
}
}
?>

</table>

<br><br>

<a href="view.php">Back to Payments</a>

</body>
</html>
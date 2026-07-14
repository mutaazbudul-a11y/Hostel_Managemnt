<?php
include("../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Student</title>
</head>
<body>

<h2>Search Student</h2>

<form method="GET">

<input type="text" name="search" placeholder="Enter Student Name" required>

<input type="submit" value="Search">

</form>

<br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Room No</th>
    <th>Gender</th>
</tr>

<?php

if(isset($_GET['search'])){

$search = $_GET['search'];

$sql = "SELECT * FROM student
        WHERE fullname LIKE '%$search%'";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['room_no']; ?></td>
<td><?php echo $row['gender']; ?></td>

</tr>

<?php
}
}
?>

</table>

<br><br>

<a href="view.php">Back to Students</a>

</body>
</html>
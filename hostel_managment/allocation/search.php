<?php
include("../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Allocation</title>
</head>
<body>

<h2>Search Allocation</h2>

<form method="GET">

<input type="text" name="search" placeholder="Enter Student Name" required>

<input type="submit" value="Search">

</form>

<br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Student Name</th>
    <th>Room Number</th>
    <th>Allocation Date</th>
</tr>

<?php

if(isset($_GET['search'])){

$search = $_GET['search'];

$sql = "SELECT allocations.id,
student.fullname,
rooms.room_number,
allocations.allocation_date
FROM allocations
JOIN student ON allocations.studentid = student.id
JOIN rooms ON allocations.roomid = rooms.id
WHERE student.fullname LIKE '%$search%'";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['room_number']; ?></td>

<td><?php echo $row['allocation_date']; ?></td>

</tr>

<?php
}
}
?>

</table>

<br><br>

<a href="view.php">Back to Allocation</a>

</body>
</html>
<?php
include("../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Room</title>
</head>
<body>

<h2>Search Room</h2>

<form method="GET">

<input type="text" name="search" placeholder="Enter Room Number" required>

<input type="submit" value="Search">

</form>

<br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Room Number</th>
    <th>Room Type</th>
    <th>Capacity</th>
    <th>Status</th>
</tr>

<?php

if(isset($_GET['search'])){

$search = $_GET['search'];

$sql = "SELECT * FROM rooms
        WHERE room_number LIKE '%$search%'";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['room_number']; ?></td>
<td><?php echo $row['room_type']; ?></td>
<td><?php echo $row['capacity']; ?></td>
<td><?php echo $row['status']; ?></td>

</tr>

<?php
}
}
?>

</table>

<br><br>

<a href="view.php">Back to Rooms</a>

</body>
</html>
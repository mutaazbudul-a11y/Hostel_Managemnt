<?php
include "../config/db.php";

$result = mysqli_query($conn, "SELECT * FROM student");

if(!$result){
    die(mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
<title>View Student</title>
</head>

<body>

<h2>Students List</h2>

<a href="add.php">Add Student</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Gender</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Room No</th>
    <th>Created At</th>
    <th>Action</th>
</tr>


<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['gender']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['room_no']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a href="view.php?id=<?php echo $row['id']; ?>">
View
</a>

|

<a href="edit.php?id=<?php echo $row['id']; ?>">
Edit
</a>

|

<a href="delete.php?id=<?php echo $row['id']; ?>">
Delete
</a>

</td>

<?php } ?>

</table>

</body>
</html>
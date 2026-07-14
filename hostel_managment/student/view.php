<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}

include("../config/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");
include("../includes/navbar.php");
?>

<div class="container-fluid mt-4">

<div class="card shadow-lg border-0 rounded-4">

<div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
<h3><i class="fa fa-users"></i> All Students</h3>

<a href="add.php" class="btn btn-light">
<i class="fa fa-plus"></i> Add Student
</a>
</div>

<div class="card-body">

<table class="table table-bordered table-hover table-striped align-middle">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Phone</th>
<th>Room</th>
<th>Gender</th>
<th width="170">Action</th>
</tr>
</thead>

<tbody>

<?php

$sql="SELECT * FROM student ORDER BY id DESC";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['id']; ?></td>
<td><?= $row['fullname']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['phone']; ?></td>
<td><?= $row['room_no']; ?></td>
<td><?= $row['gender']; ?></td>

<td>

<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
<i class="fa fa-edit"></i>
</a>

<a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Delete this student?')">
<i class="fa fa-trash"></i>
</a>

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

</div>


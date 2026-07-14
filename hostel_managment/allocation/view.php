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

$sql = "SELECT
        allocations.*,
        student.fullname,
        rooms.room_number
        FROM allocations
        INNER JOIN student
        ON allocations.studentid = student.id
        INNER JOIN rooms
        ON allocations.roomid = rooms.id
        ORDER BY allocations.id DESC";

$result = mysqli_query($conn,$sql);

if(!$result){
    die(mysqli_error($conn));
}
?>

<div class="container mt-4">

<div class="card shadow-lg border-0 rounded-4">

<div class="card-header text-white d-flex justify-content-between align-items-center"
style="background:linear-gradient(135deg,#7c3aed,#ec4899);">

<h3><i class="fas fa-home"></i> Room Allocation List</h3>

<a href="add.php" class="btn btn-light">
<i class="fas fa-plus"></i> Add Allocation
</a>

</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered table-hover text-center align-middle">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Student Name</th>
<th>Room Number</th>
<th>Allocation Date</th>

<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['fullname']; ?></td>

<td><?= $row['room_number']; ?></td>

<td><?= $row['allocation_date']; ?></td>



<td>

<?php

if($row['status']=="Active"){

echo "<span class='badge bg-success'>Active</span>";

}else{

echo "<span class='badge bg-danger'>Completed</span>";

}

?>

</td>

<td>

<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Delete Allocation?')">
<i class="fas fa-trash"></i>
</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="7" class="text-center text-danger">

No Allocation Found

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>
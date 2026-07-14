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

$sql = "SELECT * FROM rooms ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
?>

<div class="container mt-4">

<div class="row justify-content-center">

<div class="col-lg-10">

<div class="card shadow-lg border-0 rounded-4">

<div class="card-header d-flex justify-content-between align-items-center text-white"
style="background:linear-gradient(90deg,#0d6efd,#2563eb);">

<h3><i class="fas fa-bed"></i> All Rooms</h3>

<a href="add.php" class="btn btn-light">
<i class="fas fa-plus"></i> Add Room
</a>

</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered table-hover text-center align-middle">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Room No</th>
<th>Room Type</th>
<th>Capacity</th>
<th>Price</th>
<th>Status</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>


<td><?= $row['id']; ?></td>

<td><?= $row['room_number']; ?></td>

<td><?= $row['room_type']; ?></td>

<td><?= $row['capacity']; ?></td>

<td>$<?= $row['price']; ?></td>

<td>
<?php
if($row['status']=="Available"){
    echo "<span class='badge bg-success'>Available</span>";
}else{
    echo "<span class='badge bg-danger'>Occupied</span>";
}
?>
</td>

<td>

<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<a href="delete.php?id=<?= $row['id']; ?>"
onclick="return confirm('Delete this room?')"
class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i>
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

</div>

</div>


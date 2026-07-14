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

$sql = "SELECT payments.*, student.fullname
FROM payments
INNER JOIN student
ON payments.studentid = student.id
ORDER BY payments.id DESC";

$result = mysqli_query($conn,$sql);

if(!$result){
    die(mysqli_error($conn));
}
?>

<div class="container mt-4">

<div class="card shadow-lg border-0 rounded-4">

<div class="card-header text-white d-flex justify-content-between align-items-center"
style="background:linear-gradient(135deg,#059669,#14b8a6);">

<h3><i class="fas fa-money-bill-wave"></i> Payment List</h3>

<a href="add.php" class="btn btn-light">
<i class="fas fa-plus"></i> Add Payment
</a>

</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-hover table-bordered align-middle text-center">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Student</th>
<th>Amount</th>
<th>Payment Date</th>
<th>Method</th>
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

<td>$<?= number_format($row['amount'],2); ?></td>

<td><?= $row['payment_date']; ?></td>



<td>

<?php
if($row['status']=="Paid"){
echo "<span class='badge bg-success'>Paid</span>";
}else{
echo "<span class='badge bg-danger'>Pending</span>";
}
?>

</td>

<td>

<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
<i class="fas fa-edit"></i>
</a>

<a href="delete.php?id=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete Payment?')">
<i class="fas fa-trash"></i>
</a>

</td>

</tr>

<?php
}
}else{
?>

<tr>
<td colspan="7" class="text-danger text-center">
No Payment Found
</td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>
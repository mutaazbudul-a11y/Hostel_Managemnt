<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}

include("../config/db.php");

$id = $_GET['id'];

if(isset($_POST['update']))
{
    $studentid = $_POST['studentid'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $status = $_POST['status'];

    $sql = "UPDATE payments SET
            studentid='$studentid',
            amount='$amount',
            payment_date='$payment_date',
            status='$status'
            WHERE id='$id'";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        alert('Payment Updated Successfully');
        window.location='view.php';
        </script>";
    }
    else
    {
        die(mysqli_error($conn));
    }
}

$result = mysqli_query($conn,"SELECT * FROM payments WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

include("../includes/header.php");
include("../includes/sidebar.php");
include("../includes/navbar.php");
?>

<div class="container mt-4">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow-lg border-0 rounded-4">

<div class="card-header text-white"
style="background:linear-gradient(135deg,#f59e0b,#ef4444);">

<h3><i class="fas fa-edit"></i> Edit Payment</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label class="fw-bold">Student</label>

<select name="studentid" class="form-select" required>

<?php
$student = mysqli_query($conn,"SELECT * FROM student");

while($s=mysqli_fetch_assoc($student)){
?>

<option value="<?= $s['id']; ?>"
<?= ($row['studentid']==$s['id']) ? 'selected' : ''; ?>>

<?= $s['fullname']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label class="fw-bold">Amount</label>

<input type="number"
name="amount"
class="form-control"
value="<?= $row['amount']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label class="fw-bold">Payment Date</label>

<input type="date"
name="payment_date"
class="form-control"
value="<?= $row['payment_date']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label class="fw-bold">Status</label>

<select name="status" class="form-select">

<option value="Paid"
<?= ($row['status']=="Paid") ? 'selected' : ''; ?>>
Paid
</option>

<option value="Pending"
<?= ($row['status']=="Pending") ? 'selected' : ''; ?>>
Pending
</option>

</select>

</div>

</div>

<div class="text-end">

<a href="view.php" class="btn btn-secondary">
Back
</a>

<button type="submit"
name="update"
class="btn btn-warning text-white">
Update Payment
</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>


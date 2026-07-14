<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}

include("../config/db.php");

if(isset($_POST['save']))
{
    $studentid = $_POST['studentid'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO payments(studentid,amount,payment_date,status)
            VALUES('$studentid','$amount','$payment_date','$status')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        alert('Payment Added Successfully');
        window.location='view.php';
        </script>";
    }
    else
    {
        die(mysqli_error($conn));
    }
}

include("../includes/header.php");
include("../includes/sidebar.php");
include("../includes/navbar.php");
?>

<div class="container mt-4">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow-lg border-0 rounded-4">

<div class="card-header text-white"
style="background:linear-gradient(135deg,#059669,#14b8a6);">

<h3><i class="fas fa-money-bill-wave"></i> Add Payment</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label class="fw-bold">Student</label>

<select name="studentid" class="form-select" required>

<option value="">Select Student</option>

<?php
$student = mysqli_query($conn,"SELECT * FROM student");

while($s = mysqli_fetch_assoc($student)){
?>

<option value="<?= $s['id']; ?>">
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
placeholder="Enter Amount"
required>

</div>

<div class="col-md-6 mb-3">

<label class="fw-bold">Payment Date</label>

<input type="date"
name="payment_date"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label class="fw-bold">Status</label>

<select name="status" class="form-select">

<option value="Paid">Paid</option>
<option value="Pending">Pending</option>

</select>

</div>

</div>

<div class="text-end">

<button type="reset" class="btn btn-secondary">
Reset
</button>

<button type="submit" name="save" class="btn btn-success">
Save Payment
</button>

<a href="view.php" class="btn btn-primary">
View Payments
</a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>
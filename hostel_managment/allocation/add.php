<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}

include("../config/db.php");

// SAVE ALLOCATION
if(isset($_POST['save'])){

    $studentid = $_POST['studentid'];
    $roomid = $_POST['roomid'];
    $allocation_date = $_POST['allocation_date'];
   
    $status = $_POST['status'];

    $sql = "INSERT INTO allocations(studentid,roomid,allocation_date,status)
            VALUES('$studentid','$roomid','$allocation_date','$status')";

    if(mysqli_query($conn,$sql))
    {
        mysqli_query($conn,"UPDATE rooms SET status='Occupied' WHERE id='$roomid'");

        echo "<script>
        alert('Room Allocated Successfully');
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
style="background:linear-gradient(135deg,#4f46e5,#06b6d4);">

<h3><i class="fas fa-home"></i> Add Room Allocation</h3>

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

while($s = mysqli_fetch_assoc($student))
{
?>

<option value="<?= $s['id']; ?>">
<?= $s['fullname']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label class="fw-bold">Room</label>

<select name="roomid" class="form-select" required>

<option value="">Select Room</option>

<?php

$rooms = mysqli_query($conn,"SELECT * FROM rooms WHERE status='Available'");

while($r = mysqli_fetch_assoc($rooms))
{
?>

<option value="<?= $r['id']; ?>">
<?= $r['room_number']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label class="fw-bold">Allocation Date</label>

<input type="date"
name="allocation_date"
class="form-control"
required>

</div>



<div class="col-md-12 mb-4">

<label class="fw-bold">Status</label>

<select name="status" class="form-select">

<option value="Active">Active</option>
<option value="Completed">Completed</option>

</select>

</div>

</div>

<div class="text-end">

<button type="reset" class="btn btn-secondary">
Reset
</button>

<button type="submit" name="save" class="btn btn-success">
Allocate Room
</button>

<a href="view.php" class="btn btn-primary">
View Allocation
</a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>
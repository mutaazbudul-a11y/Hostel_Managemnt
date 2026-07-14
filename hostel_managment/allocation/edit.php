<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}

include("../config/db.php");

$id = $_GET['id'];

if(isset($_POST['update'])){

    $studentid = $_POST['studentid'];
    $roomid = $_POST['roomid'];
    $allocation_date = $_POST['allocation_date'];
   
    $status = $_POST['status'];

    $sql = "UPDATE allocations SET
            studentid='$studentid',
            roomid='$roomid',
            allocation_date='$allocation_date',
        
            status='$status'
            WHERE id='$id'";

    if(mysqli_query($conn,$sql)){
        echo "<script>
        alert('Allocation Updated Successfully');
        window.location='view.php';
        </script>";
    }else{
        die(mysqli_error($conn));
    }
}

$result = mysqli_query($conn,"SELECT * FROM allocations WHERE id='$id'");
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

<h3>
<i class="fas fa-edit"></i> Edit Allocation
</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label class="fw-bold">Student</label>

<select name="studentid" class="form-select">

<?php
$student=mysqli_query($conn,"SELECT * FROM student");

while($s=mysqli_fetch_assoc($student)){
?>

<option value="<?= $s['id']; ?>"
<?=($row['studentid']==$s['id'])?'selected':'';?>>

<?= $s['fullname']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label class="fw-bold">Room</label>

<select name="roomid" class="form-select">

<?php
$rooms=mysqli_query($conn,"SELECT * FROM rooms");

while($r=mysqli_fetch_assoc($room)){
?>

<option value="<?= $r['id']; ?>"
<?=($row['roomid']==$r['id'])?'selected':'';?>>

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
value="<?= $row['allocation_date']; ?>">

</div>



<div class="col-md-12 mb-4">

<label class="fw-bold">Status</label>

<select name="status" class="form-select">

<option value="Active"
<?=($row['status']=="Active")?'selected':'';?>>
Active
</option>

<option value="Completed"
<?=($row['status']=="Completed")?'selected':'';?>>
Completed
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

Update Allocation

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>
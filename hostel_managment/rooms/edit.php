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

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM rooms WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $room_number   = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $capacity  = $_POST['capacity'];
    $price     = $_POST['price'];
    $status    = $_POST['status'];

    $sql = "UPDATE rooms SET
            room_number='$room_number',
            room_type='$room_type',
            capacity='$capacity',
            price='$price',
            status='$status'
            WHERE id='$id'";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        alert('Room Updated Successfully');
        window.location='view.php';
        </script>";
    }
    else{
        die (mysqli_error ($conn));
    }
}
?>

<div class="container mt-4">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow-lg border-0 rounded-4">

<div class="card-header text-white"
style="background:linear-gradient(90deg,#7c3aed,#f97316);">

<h3><i class="fas fa-bed"></i> Edit Room</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label>Room Number</label>
<input type="text"
name="room_number"
class="form-control"
value="<?= $row['room_number']; ?>"
required>
</div>

<div class="col-md-6 mb-3">
<label>Room Type</label>

<select name="room_type" class="form-select">

<option <?=($row['room_type']=="Single")?"selected":"";?>>
Single
</option>

<option <?=($row['room_type']=="Double")?"selected":"";?>>
Double
</option>

<option <?=($row['room_type']=="VIP")?"selected":"";?>>
VIP
</option>

</select>

</div>

<div class="col-md-6 mb-3">
<label>Capacity</label>
<input type="number"
name="capacity"
class="form-control"
value="<?= $row['capacity']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Price</label>
<input type="number"
name="price"
class="form-control"
value="<?= $row['price']; ?>">
</div>

<div class="col-md-12 mb-4">
<label>Status</label>

<select name="status" class="form-select">

<option <?=($row['status']=="Available")?"selected":"";?>>
Available
</option>

<option <?=($row['status']=="Occupied")?"selected":"";?>>
Occupied
</option>

<option <?=($row['status']=="Maintenance")?"selected":"";?>>
Maintenance
</option>

</select>

</div>

</div>

<div class="text-end">

<a href="view.php" class="btn btn-secondary">
<i class="fas fa-arrow-left"></i>
Back
</a>

<button type="submit"
name="update"
class="btn btn-warning text-white">

<i class="fas fa-save"></i>
Update Room

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

<?php include("../includes/footer.php"); ?>
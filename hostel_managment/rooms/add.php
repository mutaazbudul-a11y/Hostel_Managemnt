<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}

include("../config/db.php");

if(isset($_POST['save']))
{
    $room_number  = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $capacity  = $_POST['capacity'];
    $price     = $_POST['price'];
    $status    = $_POST['status'];

    $sql = "INSERT INTO rooms(room_number,room_type,capacity,price,status)
            VALUES('$room_number','$room_type','$capacity','$price','$status')";

    if(mysqli_query($conn,$sql))
    {
     
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
style="background:linear-gradient(90deg,#0d6efd,#2563eb);">

<h3>
<i class="fas fa-bed"></i> Add New Room
</h3>

</div>

<div class="card-body">

<form action="" method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label class="fw-bold">Room Number</label>
<input type="text"
name="room_number"
class="form-control form-control-lg"
placeholder="Enter Room Number"
required>
</div>

<div class="col-md-6 mb-3">
<label class="fw-bold">Room Type</label>

<select name="room_type"
class="form-select form-select-lg"
required>

<option value="">Select Room Type</option>
<option>Single</option>
<option>Double</option>
<option>VIP</option>

</select>

</div>

<div class="col-md-6 mb-3">
<label class="fw-bold">Capacity</label>
<input type="number"
name="capacity"
class="form-control form-control-lg"
placeholder="Capacity"
required>
</div>

<div class="col-md-6 mb-3">
<label class="fw-bold">Price ($)</label>
<input type="number"
name="price"
class="form-control form-control-lg"
placeholder="Room Price"
required>
</div>

<div class="col-md-12 mb-4">
<label class="fw-bold">Status</label>

<select name="status"
class="form-select form-select-lg">

<option>Available</option>
<option>Occupied</option>
<option>Maintenance</option>

</select>

</div>

</div>

<div class="text-end">

<button type="reset"
class="btn btn-secondary">

<i class="fas fa-rotate"></i>
Reset

</button>

<button type="submit"
name="save"
class="btn btn-success">

<i class="fas fa-save"></i>
Save Room

</button>

<a href="view.php"
class="btn btn-primary">

<i class="fas fa-list"></i>
View Rooms

</a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>


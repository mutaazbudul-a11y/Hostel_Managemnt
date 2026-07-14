<?php

include("../config/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");
include("../includes/navbar.php");






if(isset($_POST['save']))
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $room_no = $_POST['room_no'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO student(fullname,email,phone,room_no,gender)
            VALUES('$fullname','$email','$phone','$room_no','$gender')";

    if(mysqli_query($conn,$sql))
    {
        echo "Student Added Successfully";
    }
    else
    {
        echo "Error";
    }
}

?>


<div class="container" style="max: width 900px;">

<div class="card shadow-lg border-0 ">

<div class="card-header bg-primary text-white">
    <h3 class="mb-0">
        <i class="fas fa-user-plus"></i> Add New Student
    </h3>
</div>

<div class="card-body">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="fullname" class="form-control" placeholder="Enter Full Name" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Email Address</label>
<input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Phone Number</label>
<input type="text" name="phone" class="form-control" placeholder="61xxxxxxx" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Room Number</label>
<input type="number" name="room_no" class="form-control" placeholder="Room Number" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Gender</label>

<select name="gender" class="form-select" required>
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>

</div>

</div>

<hr>

<div class="text-end">

<button type="reset" class="btn btn-secondary">
<i class="fas fa-redo"></i> Reset
</button>

<button type="submit" name="save" class="btn btn-success">
<i class="fas fa-save"></i> Save Student
</button>

<a href="view.php" class="btn btn-primary">
<i class="fas fa-users"></i> View Students
</a>

</div>

</form>

</div>

</div>

</div>

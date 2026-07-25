<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
    exit();
}

include("../config/db.php");

$id = $_SESSION['id'];

if(isset($_POST['update'])){

    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $email    = mysqli_real_escape_string($conn,$_POST['email']);
    $phone    = mysqli_real_escape_string($conn,$_POST['phone']);

    $update = mysqli_query($conn,"UPDATE student SET
        fullname='$fullname',
        email='$email',
        phone='$phone'
        WHERE id='$id'");

    if($update){
        echo "<script>alert('Profile Updated Successfully');</script>";
        echo "<script>window.location='profile.php';</script>";
        exit();
    }else{
        echo "<script>alert('Update Failed');</script>";
    }
}

$query = mysqli_query($conn,"SELECT * FROM student WHERE id='$id'");
$row = mysqli_fetch_assoc($query);

include("../includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#eef2f7;
}

.card{
    max-width:700px;
    margin:40px auto;
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.card-header{
    background:linear-gradient(135deg,#0d6efd,#20c997);
    color:white;
    padding:20px;
}

.card-body{
    padding:30px;
}

.form-control{
    border-radius:10px;
}

.btn{
    border-radius:10px;
}

</style>

</head>

<body>

<div class="card shadow-lg">

<div class="card-header">
<h3>Edit My Profile</h3>
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>Full Name</label>
<input type="text" name="fullname" class="form-control"
value="<?php echo $row['fullname']; ?>" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control"
value="<?php echo $row['email']; ?>" required>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control"
value="<?php echo $row['phone']; ?>" required>
</div>

<div class="mb-3">
<label>Username</label>
<input type="text" class="form-control"
value="<?php echo $row['username']; ?>" readonly>
</div>

<div class="text-end">

<a href="profile.php" class="btn btn-secondary">
Back
</a>

<button type="submit" name="update" class="btn btn-success">
Update Profile
</button>

</div>

</form>

</div>

</div>

</body>

</html>
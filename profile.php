<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
    exit();
}

include("../config/db.php");

$id = $_SESSION['id'];

$query = mysqli_query($conn,"SELECT * FROM student WHERE id='$id'");
$row = mysqli_fetch_assoc($query);

include("../includes/header.php");
?>

<style>

body{
    background:#eef2f7;
}

.profile-card{
    max-width:900px;
    margin:40px auto;
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

.profile-header{
    background:linear-gradient(135deg,#4e73df,#1cc88a);
    color:#fff;
    text-align:center;
    padding:35px;
}

.profile-img{
    width:120px;
    height:120px;
    border-radius:50%;
    background:#fff;
    color:#4e73df;
    font-size:50px;
    font-weight:bold;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:auto;
}

.profile-body{
    padding:30px;
}

.info{
    margin-bottom:18px;
    padding:15px;
    border-radius:10px;
    background:#f8f9fa;
}

.info strong{
    color:#4e73df;
}

.btn-area{
    text-align:center;
    margin-top:30px;
}

</style>

<div class="profile-card">

<div class="profile-header">

<div class="profile-img">
<?php echo strtoupper(substr($row['fullname'],0,1)); ?>
</div>

<h2 class="mt-3"><?php echo $row['fullname']; ?></h2>

<p>Hostel Student</p>

</div>

<div class="profile-body">

<div class="info">
<strong>Username:</strong>
<?php echo $row['username']; ?>
</div>

<div class="info">
<strong>Full Name:</strong>
<?php echo $row['fullname']; ?>
</div>

<div class="info">
<strong>Email:</strong>
<?php echo $row['email']; ?>
</div>

<div class="info">
<strong>Phone:</strong>
<?php echo $row['phone']; ?>
</div>

<div class="info">
<strong>Gender:</strong>
<?php echo $row['gender']; ?>
</div>

<div class="info">
<strong>Room Number:</strong>
<?php echo $row['room_no']; ?>
</div>

<div class="btn-area">

<a href="edit_profile.php" class="btn btn-primary">
Edit Profile
</a>

<a href="dashboard.php" class="btn btn-success">
Dashboard
</a>

</div>

</div>

</div>


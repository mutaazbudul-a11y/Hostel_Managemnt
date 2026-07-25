



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
    background:#f4f7fc;
}

.dashboard{
    padding:30px;
}

.welcome{
    background:linear-gradient(135deg,#0d6efd,#20c997);
    color:#fff;
    border-radius:20px;
    padding:30px;
    margin-bottom:30px;
}

.card-box{
    border:none;
    border-radius:18px;
    padding:25px;
    color:#fff;
    transition:.3s;
}

.card-box:hover{
    transform:translateY(-5px);
}

.profile{
    background:#0d6efd;
}

.room{
    background:#198754;
}

.payment{
    background:#dc3545;
}

.password{
    background:#6f42c1;
}

a{
    text-decoration:none;
}

.logout-card{
    border-top:5px solid #800000;
}

.logout-btn{

    display:inline-block;
    margin-top:15px;
    background:#800000;
    color:white;
    padding:10px 25px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;

}

.logout-btn:hover{

    background:#5c0000;

}

</style>
<div class="content">
</div>
<div class="container dashboard">

<div class="welcome shadow">

<h2>Welcome, <?php echo $row['fullname']; ?> 👋</h2>

<p>Welcome to Hostel Management System.</p>

</div>

<div class="row">

<div class="col-md-6 col-lg-3 mb-4">

<a href="profile.php">

<div class="card-box profile shadow">

<h4>My Profile</h4>

<p>View your information</p>

</div>

</a>

</div>

<div class="col-md-6 col-lg-3 mb-4">

<a href="room.php">

<div class="card-box room shadow">

<h4>My Room</h4>

<p>Room Details</p>

</div>

</a>

</div>

<div class="col-md-6 col-lg-3 mb-4">

<a href="payments.php">

<div class="card-box payment shadow">

<h4>My Payments</h4>

<p>Payment History</p>

</div>

</a>

</div>

<div class="col-md-6 col-lg-3 mb-4">

<a href="change_password.php">

<div class="card-box password shadow">

<h4>Password</h4>

<p>Change Password</p>

</div>

</a>


</div>


</a>
<div class="card logout-card">

    <h3>🚪 Logout</h3>

    <p>Exit your account safely</p>

    <a href="logout.php" class="logout-btn">
        Logout
    </a>

</div>
</div>

</div>



<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include("../config/db.php");

$student = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM student"));
$rooms = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM rooms"));
$allocations = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM allocations"));
$payments = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM payments"));

include("../includes/header.php");
include("../includes/sidebar.php");
include("../includes/navbar.php");
?>

<div class="main">

<
<br>

<div class="cards">

<div class="card-box">
<h4>Total Students</h4>
<h1><?php echo $student; ?></h1>
</div>

<div class="card-box">
<h4>Total Rooms</h4>
<h1><?php echo $rooms; ?></h1>
</div>

<div class="card-box">
<h4>Total Allocations</h4>
<h1><?php echo $allocations; ?></h1>
</div>

<div class="card-box">
<h4>Total Payments</h4>
<h1><?php echo $payments; ?></h1>
</div>

</div>

<br><br>

<h3>Quick Menu</h3>

<div class="content">

<?php

if(isset($_GET['page'])){

    $page = $_GET['page'];

    if($page=="reports"){

        include("../reports/index.php");

    }

}else{

?>





<?php
}
?>

</div>

<br>

<a href="../student/view.php" class="btn btn-primary">Students</a>

<a href="../rooms/view.php" class="btn btn-success">Rooms</a>

<a href="../allocation/view.php" class="btn btn-warning">Allocation</a>

<a href="../payments/view.php" class="btn btn-danger">Payments</a>

<a href="../reports/index.php"> </a>

</div>


<script>

var studentCount = <?php echo $student; ?>;
var roomCount = <?php echo $rooms; ?>;
var allocationCount = <?php echo $allocations; ?>;
var paymentCount = <?php echo $payments; ?>;

</script>

<div class="chart-box">
    <h3>Hostel Statistics</h3>

    <canvas id="myChart"></canvas>
</div>




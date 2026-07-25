<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
    exit();
}

include("../config/db.php");

$id = $_SESSION['id'];

$sql = mysqli_query($conn,"
SELECT student.fullname,
       rooms.room_number,
       rooms.room_type,
       rooms.capacity,
       allocations.allocation_date,
   
       allocations.status
FROM allocations
INNER JOIN student ON allocations.studentid = student.id
INNER JOIN rooms ON allocations.roomid = rooms.id
WHERE student.id='$id'
");

$row = mysqli_fetch_assoc($sql);

include("../includes/header.php");
?>

<style>

body{
    background:#eef3f8;
}

.room-card{
    width:800px;
    margin:40px auto;
    background:#fff;
    border-radius:20px;
    overflow:hidden;
}

.room-header{
    background:linear-gradient(135deg,#198754,#0dcaf0);
    color:white;
    padding:25px;
}

table{
    width:100%;
}

td{
    padding:15px;
}

tr:nth-child(even){
    background:#f8f9fa;
}

</style>

<div class="room-card shadow">

<div class="room-header">

<h2>My Room</h2>

</div>

<div class="p-4">

<?php if($row){ ?>

<table class="table table-bordered">

<tr>
<th>Student</th>
<td><?php echo $row['fullname']; ?></td>
</tr>

<tr>
<th>Room Number</th>
<td><?php echo $row['room_number']; ?></td>
</tr>

<tr>
<th>Room Type</th>
<td><?php echo $row['room_type']; ?></td>
</tr>

<tr>
<th>Capacity</th>
<td><?php echo $row['capacity']; ?></td>
</tr>

<tr>
<th>Allocation Date</th>
<td><?php echo $row['allocation_date']; ?></td>
</tr>

<tr>
<th>End Date</th>
<td><?php echo $row['end_date']; ?></td>
</tr>

<tr>
<th>Status</th>
<td>
<span class="badge bg-success">
<?php echo $row['status']; ?>
</span>
</td>
</tr>

</table>

<?php }else{ ?>

<div class="alert alert-warning">
No Room Allocated Yet.
</div>

<?php } ?>

<div class="text-end">

<a href="dashboard.php" class="btn btn-primary">
Back Dashboard
</a>

</div>

</div>

</div>
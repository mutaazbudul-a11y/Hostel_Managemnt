<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}

include("../config/db.php");

$result = mysqli_query($conn,"SELECT * FROM student");
?>

<!DOCTYPE html>
<html>
<head>

<title>Students Report</title>

<style>

body{
    font-family: Arial, sans-serif;
    background:#f4f6f9;
    margin:0;
    padding:30px;
}


.container{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}


h2{
    text-align:center;
    color:#2c3e50;
    margin-bottom:20px;
}


.top{
    display:flex;
    justify-content:space-between;
    margin-bottom:20px;
}


button{
    background:#3498db;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:6px;
    cursor:pointer;
    font-size:15px;
}


button:hover{
    background:#217dbb;
}


a{
    text-decoration:none;
    background:#2ecc71;
    color:white;
    padding:10px 18px;
    border-radius:6px;
}


a:hover{
    background:#27ae60;
}


table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}


th{
    background:#34495e;
    color:white;
    padding:12px;
}


td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}


tr:hover{
    background:#f1f1f1;
}


@media print{

button,a{
    display:none;
}

body{
    background:white;
}

.container{
    box-shadow:none;
}

}

</style>

</head>


<body>


<div class="container">


<h2>Students Report</h2>


<div class="top">

<button onclick="window.print()">Print Report</button>

<a href="../admin/dashboard.php">Back Dashboard</a>

</div>



<table>


<tr>

<th>ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Phone</th>
<th>Room</th>
<th>Gender</th>

</tr>



<?php
while($row=mysqli_fetch_assoc($result)){
?>


<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['room_no']; ?></td>

<td><?php echo $row['gender']; ?></td>

</tr>


<?php
}
?>


</table>


</div>


</body>
</html>
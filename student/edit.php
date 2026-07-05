<?php

include "../config/db.php";

IF(!isset($_GET['id'])){
    die ("id lama helin");
}

$id = $_GET['id'];


$result = mysqli_query($conn,"SELECT * FROM student WHERE id=$id");


if(!$result){
    die(mysqli_error($conn));
}


$row=mysqli_fetch_assoc($result);



if(isset($_POST['update'])){


$fullname=$_POST['fullname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$room_no=$_POST['room_no'];


$sql="UPDATE student SET

fullname='$fullname',
gender='$gender',
email='$email',
phone='$phone',
room_no='$room_no'

WHERE id=$id";


if(mysqli_query($conn,$sql)){

header("Location:view.php");

}else{

echo mysqli_error($conn);

}


}

?>


<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
</head>

<body>


<h2>Edit Student</h2>


<form method="POST">


Full Name:

<input type="text" name="fullname"
value="<?php echo $row['fullname']; ?>">

<br><br>


Gender:

<input type="text" name="gender"
value="<?php echo $row['gender']; ?>">

<br><br>


Email:

<input type="email" name="email"
value="<?php echo $row['email']; ?>">

<br><br>


Phone:

<input type="text" name="phone"
value="<?php echo $row['phone']; ?>">

<br><br>


Room No:

<input type="text" name="room_no"
value="<?php echo $row['room_no']; ?>">

<br><br>


<button name="update">
Update
</button>


</form>


</body>
</html>

<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}


include("../config/db.php");

$id = $_GET['id'];

$sql = "DELETE FROM student WHERE id='$id'";

if(mysqli_query($conn, $sql)){
    header("Location: view.php");
    exit();
}else{
    echo "Delete Failed";
}
?>
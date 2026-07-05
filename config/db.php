<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "hostel_managment";

$conn = mysqli_connect("localhost", "root", "", "hostel_managment");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}


echo "Database Connected Successfully";
?>
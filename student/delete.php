<?php

include "../config/db.php";
IF(!isset($_GET['id'])){
    die ("id lama helin");
}

$id=$_GET['id'];


$sql="DELETE FROM student WHERE id=$id";


if(mysqli_query($conn,$sql)){

header("Location:view.php");

}else{

echo mysqli_error($conn);

}

?>
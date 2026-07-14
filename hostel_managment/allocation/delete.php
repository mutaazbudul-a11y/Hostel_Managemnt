<?php
include("../config/db.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM allocations WHERE id='$id'";

    if(mysqli_query($conn,$sql)){
        header("Location:view.php");
        exit();
    }else{
        echo mysqli_error($conn);
    }

}else{
    echo "Invalid Request";
}
?>
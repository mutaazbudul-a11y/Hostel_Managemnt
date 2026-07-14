<?php
include("../config/db.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM rooms WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        header("Location: view.php");
        exit();

    } else {

        echo "Error deleting room: " . mysqli_error($conn);

    }

} else {

    echo "ID not found.";

}
?>
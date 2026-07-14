 
 <?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../admin/login.php");
    exit();
}

include("../config/db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM student WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $room_no  = $_POST['room_no'];
    $gender   = $_POST['gender'];

    $update = "UPDATE student
               SET fullname='$fullname',
                   email='$email',
                   phone='$phone',
                   room_no='$room_no',
                   gender='$gender'
               WHERE id='$id'";

    if(mysqli_query($conn,$update))
    {
        header("Location: view.php");
        exit();
    }
    else
    {
        echo "Update Failed!";
    }
}

include("../includes/header.php");
include("../includes/sidebar.php");
include("../includes/navbar.php");
?>

<div class="container mt-4" style="max-width:900px;">

<div class="card shadow-lg rounded-4">

<div class="card-header bg-warning text-dark">
<h3><i class="fa fa-edit"></i> Edit Student</h3>
</div>

<div class="card-body">

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label>Full Name</label>
<input type="text" name="fullname" class="form-control"
value="<?= $row['fullname']; ?>" required>
</div>

<div class="col-md-6 mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control"
value="<?= $row['email']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control"
value="<?= $row['phone']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Room Number</label>
<input type="number" name="room_no" class="form-control"
value="<?= $row['room_no']; ?>">
</div>

<div class="col-md-6 mb-3">
<label>Gender</label>

<select name="gender" class="form-select">

<option value="Male"
<?= ($row['gender']=="Male") ? "selected" : ""; ?>>
Male
</option>

<option value="Female"
<?= ($row['gender']=="Female") ? "selected" : ""; ?>>
Female
</option>

</select>

</div>

</div>

<button type="submit" name="update" class="btn btn-success">
<i class="fa fa-save"></i> Update Student
</button>

<a href="view.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</div>

</div>


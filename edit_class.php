<?php
require "./db.php";
require "./header.php";
require "./functions.php";

if(!isset($_GET['id'])){
    die("Class ID Missing!");
}

$id = $_GET['id'];

$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM class_master WHERE class_id='$id'"));

if(isset($_POST['submit'])){
    $class = $_POST['class_name'];
    $section = $_POST['section'];

    $update = "UPDATE class_master SET class_name='$class', section='$section' WHERE class_id='$id'";
    mysqli_query($conn, $update);

    echo "<script>alert(' Class Updated Successfully!'); window.location='all_class.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Class</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5" style="max-width:600px;">
<div class="card shadow">
<div class="card-header bg-primary text-white">Edit Class</div>
<div class="card-body">

<form method="POST">

<label class="form-label">Class Name</label>
<input type="text" class="form-control mb-3" name="class_name" value="<?= $row['class_name'] ?>" required>

<label class="form-label">Section</label>
<input type="text" class="form-control mb-3" name="section" value="<?= $row['section'] ?>" required>

<button class="btn btn-success" name="submit">Update</button>

</form>

</div>
</div>
</div>

</body>
</html>

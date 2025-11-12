<?php
require "./db.php";
require "./header.php";
require "./functions.php";

if(!isset($_GET['id'])){
    die("Session ID Missing!");
}

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM session_master WHERE session_id='$id'"));

if(isset($_POST['submit'])){
    $start = $_POST['start_year'];
    $end = $_POST['end_year'];

    $update = "UPDATE session_master SET start_year='$start', end_year='$end' WHERE session_id='$id'";
    mysqli_query($conn, $update);

    echo "<script>alert(' Academic Year Updated!'); window.location='acadmic_year.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Academic Year</title>
</head>
<body>
<div class="container mt-5" style="max-width:600px;">
<div class="card shadow">
<div class="card-header bg-primary text-white">Edit Academic Year</div>
<div class="card-body">

<form method="POST">

<label class="form-label">Start Year</label>
<input type="number" class="form-control mb-3" name="start_year" value="<?= $data['start_year'] ?>" required>

<label class="form-label">End Year</label>
<input type="number" class="form-control mb-3" name="end_year" value="<?= $data['end_year'] ?>" required>

<button class="btn btn-success" name="submit">Update</button>

</form>
</div>
</div>
</div>
</body>
</html>

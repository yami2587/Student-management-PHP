<?php 
require './db.php';
require './header.php';
require './functions.php';

if(!isset($_GET['id'])){
    die("Student ID Missing!");
}

$id = $_GET['id'];
$student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE student_id='$id'"));

// Fetch class & session lists ONLY ONCE
$getclasses = getclasses();
$sessionYears = getsessions();

if(isset($_POST['submit'])){

    $roll = $_POST['roll_no'];
    $name = $_POST['student_name'];
    $class = $_POST['class_id'];
    $session = $_POST['session_id'];
    $contact = $_POST['contact_number'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $details = $_POST['details'];
    $gname = $_POST['guardian_name'];
    $gnum = $_POST['guardian_number'];

    // Image Update
    if($_FILES['image']['name'] != ""){
        $img = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$img);
    } else {
        $img = $student['image'];
    }

    $update = "UPDATE students SET 
               roll_no='$roll', student_name='$name', image='$img', 
               class_id='$class', session_id='$session',
               contact_number='$contact', dob='$dob', address='$address', 
               details='$details', guardian_name='$gname', guardian_number='$gnum'
               WHERE student_id='$id'";

    mysqli_query($conn, $update);

    echo "<script>alert('Student Updated Successfully'); window.location='Dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5" style="max-width:700px;">
<div class="card shadow">
<div class="card-header bg-primary text-white fw-bold">Edit Student</div>
<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<label>Profile Image</label><br>
<img src="uploads/<?= $student['image'] ?>" width="85" class="rounded mb-2"><br>
<input type="file" class="form-control mb-3" name="image">

<label>Roll No</label>
<input type="text" class="form-control mb-3" name="roll_no" value="<?= $student['roll_no'] ?>" required>

<label>Student Name</label>
<input type="text" class="form-control mb-3" name="student_name" value="<?= $student['student_name'] ?>" required>

<label>Class</label>
<select class="form-control mb-3" name="class_id" required>
<?php foreach($getclasses as $c): ?>
<option value="<?= $c['class_id'] ?>" <?= ($c['class_id']==$student['class_id'])?'selected':'' ?>>
<?= $c['class_name'] ?> - <?= $c['section'] ?>
</option>
<?php endforeach; ?>
</select>

<label>Session</label>
<select class="form-control mb-3" name="session_id" required>
<?php foreach($sessionYears as $s): ?>
<option value="<?= $s['session_id'] ?>" <?= ($s['session_id']==$student['session_id'])?'selected':'' ?>>
<?= $s['start_year'] ?> - <?= $s['end_year'] ?>
</option>
<?php endforeach; ?>
</select>

<label>Contact Number</label>
<input type="text" class="form-control mb-3" name="contact_number" value="<?= $student['contact_number'] ?>">

<label>DOB</label>
<input type="date" class="form-control mb-3" name="dob" value="<?= $student['dob'] ?>">

<label>Address</label>
<textarea class="form-control mb-3" name="address"><?= $student['address'] ?></textarea>

<label>Details</label>
<textarea class="form-control mb-3" name="details"><?= $student['details'] ?></textarea>

<label>Guardian Name</label>
<input type="text" class="form-control mb-3" name="guardian_name" value="<?= $student['guardian_name'] ?>">

<label>Guardian Number</label>
<input type="text" class="form-control mb-3" name="guardian_number" value="<?= $student['guardian_number'] ?>">

<button class="btn btn-success w-100" name="submit">Update Student</button>

</form>

</div>
</div>
</div>

</body>
</html>

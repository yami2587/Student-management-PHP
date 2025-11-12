<?php
require './db.php';
require './header.php';
require './functions.php';

$students = getStudents();

if (isset($_POST['submit'])) {
    $roll_no = $_POST['roll_no'];
    $student_name = $_POST['student_name'];
    $class_id = $_POST['class_id'];
    $session_id = $_POST['session_id'];
    $contact_number = $_POST['contact_number'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $details = $_POST['details'];
    $guardian_name = $_POST['guardian_name'];
    $guardian_number = $_POST['guardian_number'];

    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $upload_path = "images/" . $image_name;
    move_uploaded_file($tmp_name, $upload_path);

    $sql = "INSERT INTO students (roll_no, student_name, image, class_id, session_id, contact_number, address, details, guardian_name, guardian_number, dob)
            VALUES ('$roll_no','$student_name','$image_name','$class_id','$session_id','$contact_number','$address','$details','$guardian_name','$guardian_number','$dob')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Student Added Successfully!'); window.location='Dashboard.php';</script>";
    } else {
        echo "<script>alert('Error Adding Student');</script>";
    }
}

$getclasses = getclasses();
$sessionYears = getsessions();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Student</title>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
  <div class="card-body">
 
        <h1>add Student</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image"  class="form-control"  required><br>

            <label for="roll_no">Roll No:</label>
            <input type="text" name="roll_no" id="roll_no"  class="form-control" required><br>

            <label for="student_name">Name:</label>
            <input type="text" name="student_name" id="student_name"  class="form-control"  required><br>

            <label>Class:</label>
            <select name="class_id"  class="form-control"  required>
                <option value="">Select Class</option>
                <?php while ($c = mysqli_fetch_assoc($getclasses)) { ?>
                    <option value="<?= $c['class_id'] ?>"><?= $c['class_name'] . " - " . $c['section'] ?></option>
                <?php } ?>
            </select><br>

            <label>Session:</label>
            <select name="session_id"  class="form-control"  required>
                <option value="">Select Session</option>
                <?php while ($s = mysqli_fetch_assoc($sessionYears)) { ?>
                    <option value="<?= $s['session_id'] ?>"><?= $s['start_year'] . " - " . $s['end_year'] ?></option>
                <?php } ?>
            </select><br>

            <label for="contact_number">Contact Number:</label>
            <input type="text"  class="form-control"  name="contact_number" id="contact_number" required><br>

            <label for="dob">DOB:</label>
            <input type="date"  class="form-control"  name="dob" id="dob" required><br>

            <label for="address">Address:</label>
            <input type="text" class="form-control"  name="address" id="address" required><br>

            <label for="details">Details:</label>
            <textarea name="details"  class="form-control"  id="details" required></textarea><br>

            <label for="guardian_name">Guardian Name:</label>
            <input type="text"  class="form-control"  name="guardian_name" id="guardian_name" required><br>

            <label for="guardian_number">Guardian Number:</label>
            <input type="text" class="form-control"  name="guardian_number" id="guardian_number" required><br>

            <button type="submit" name="submit" class="btn btn-lg btn-primary"><span >ADD STUDENT</span></button>
        </form>
 </div>
</div>
    </div>
</body>

</html>
<?php
require './db.php';
require './header.php';
require './functions.php';

$students = getStudents();
// SELECT class_id, class_name, section FROM class_master

if (isset($_POST['submit'])) {
    $class_name = $_POST['class_name'];
    $section = $_POST['section'];
   
    $sql = "INSERT INTO class_master (class_name, section)
            VALUES ('$class_name','$section')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Student Added Successfully!'); window.location='all_class.php';</script>";
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
    <title>Add Classes</title>
</head>

<body>
    <div class="content">
        <h1>add Classes</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="class_name">class name</label>
            <input type="text" name="class name" id="class_name" required><br>
            <label for="section">section</label>
            <input type="text" name="section" id="section" required><br>
             <button type="submit" name="submit"><span class="badge bg-primary">ADD</span></button>
        </form>
    </div>
</body>

</html>
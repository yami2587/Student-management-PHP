<?php
require './db.php';

if (isset($_POST['submit'])) {
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];

    $sql = "INSERT INTO session_master (start_year, end_year) VALUES ('$start_year', '$end_year')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Academic Year Added Successfully!'); window.location='acadmic_year.php';</script>";
    } else {
        echo "<script>alert(' Error Adding Academic Year!'); window.location='acadmic_year.php';</script>";
    }
} 
else {
    header("Location: acadmic_year.php");
    exit();
}
?>

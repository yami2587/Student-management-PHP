<?php
require './db.php';

if(!isset($_GET['id'])){
    echo "<script>alert('No student selected!'); window.location='Dashboard.php';</script>";
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE student_id = '$id'";

if(mysqli_query($conn, $sql)){
    echo "<script>alert(' Student deleted successfully'); window.location='Dashboard.php';</script>";
} else {
    echo "<script>alert('Failed to delete student'); window.location='Dashboard.php';</script>";
}
?>

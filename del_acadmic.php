<?php
require './db.php';

// SELECT session_id, start_year, end_year FROM session_master";
if(!isset($_GET['id'])){
    echo "<script>alert('No YEAR selected!'); window.location='acadmic_year.php';</script>";
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM session_master WHERE session_id = '$id'";

if(mysqli_query($conn, $sql)){
    echo "<script>alert(' Year deleted successfully'); window.location='acadmic_year.php';</script>";
} else {
    echo "<script>alert('Failed to delete Year'); window.location='acadmic_year.php';</script>";
}
?>

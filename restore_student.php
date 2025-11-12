<?php
require './db.php';

if (!isset($_GET['id'])) {
    die("Invalid Request");
}

$id = intval($_GET['id']);
$sql = "UPDATE students SET is_deleted = 0 WHERE student_id = $id";

if ($conn->query($sql)) {
    echo "<script>alert('Student Restored Successfully!'); window.location='trash_students.php';</script>";
} else {
    echo "<script>alert('Failed to Restore!');</script>";
}
?>

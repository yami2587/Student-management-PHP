<?php
require './db.php';

if (!isset($_GET['id'])) {
    die("Invalid Request");
}

$id = intval($_GET['id']);

$sql = "UPDATE students SET is_deleted = 1 WHERE student_id = $id";

if ($conn->query($sql)) {
    echo "<script>alert(' Student moved to Trash successfully'); window.location='Dashboard.php';</script>";
} else {
    echo "<script>alert(' Failed to delete student'); window.location='Dashboard.php';</script>";
}
?>

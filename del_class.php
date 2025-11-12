<?php
require './db.php';


// SELECT class_id, class_name, section FROM class_master"
if(!isset($_GET['id'])){
    echo "<script>alert('No Class selected!'); window.location='all_class.php';</script>";
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM class_master WHERE class_id = '$id'";

if(mysqli_query($conn, $sql)){
    echo "<script>alert(' Class deleted successfully'); window.location='all_class.php';</script>";
} else {
    echo "<script>alert('Failed to delete Class'); window.location='all_class.php';</script>";
}
?>

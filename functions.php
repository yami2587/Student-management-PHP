<?php
require_once "./db.php";

function getStudents() {
    global $conn;
    $sql = "SELECT s.*, 
            c.class_name, c.section, 
            ss.start_year, ss.end_year
            FROM students s
            JOIN class_master c ON s.class_id = c.class_id
            JOIN session_master ss ON s.session_id = ss.session_id
            ORDER BY s.student_id DESC";
    return mysqli_query($conn, $sql);
}


function getclasses() {
    global $conn;
    return mysqli_query($conn, "SELECT * FROM class_master ORDER BY class_name ASC");
}
$getclasses = getclasses();

function getsessions() {
    global $conn;
    return mysqli_query($conn, "SELECT * FROM session_master ORDER BY start_year DESC");
}
?>

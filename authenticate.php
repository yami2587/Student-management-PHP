<?php 
require './db.php';
require './functions.php';

$students = getStudents();


// Function to authenticate user and fwd to dashboard if valid
function authenticate_user($username, $password) {
    global $conn;
    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // User authenticated
        return true;
    } else {
        // Invalid credentials
        return false;
    }
}






?>


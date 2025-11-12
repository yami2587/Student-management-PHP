<?php
require "./db.php";
session_start();

if (isset($_SESSION['admin_logged_in'])) {
    header("Location: Dashboard.php");
    exit;
}

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm  = trim($_POST['confirm_password']);

    // Basic validation
    if ($password !== $confirm) {
        $error = "Passwords do not match!";
    } else {
        // Check if username already exists
        $check = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Username already taken!";
        } else {
            // Insert new user (plain password for now — you can switch to hashing later)
            $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
            if (mysqli_query($conn, $sql)) {
                $success = "Registration successful! You can now log in.";
                header("Location: Dashboard.php");
            } else {
                $error = "Error: Could not register user.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="card shadow-lg p-4" style="width: 370px; border-radius: 12px;">
    <h3 class="text-center mb-3 text-success fw-bold">Create Admin Account</h3>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger py-2"><?= $error ?></div>
    <?php elseif (isset($success)): ?>
        <div class="alert alert-success py-2"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Choose Username" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        </div>

        <button class="btn btn-success w-100" name="register">Register</button>

        <p class="text-center mt-3 mb-0">
            Already have an account?
            <a href="login.php" class="text-primary">Login</a>
        </p>
    </form>

</div>

</body>
</html>

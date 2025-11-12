<?php
require "./db.php";
session_start();

if(isset($_SESSION['admin_logged_in'])){
    header("Location: Dashboard.php");
    exit;
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' LIMIT 1");

    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);

        if($password === $user['password']){
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            header("Location: Dashboard.php");
            exit;
        } else {
            $error = " Incorrect Password";
        }
    } else {
        $error = "Username Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="card shadow-lg p-4" style="width: 350px; border-radius: 12px;">
    <h3 class="text-center mb-3 text-primary fw-bold">SMS Login</h3>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger py-2"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>

        <button class="btn btn-primary w-100" name="login">Login</button>
        <p class="text-center mt-3 mb-0">
            Don't Have an account?
            <a href="register.php" class="text-success">Register</a>
        </p>
    </form>
     
</div>

</body>
</html>

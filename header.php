<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['admin_logged_in']) && basename($_SERVER['PHP_SELF']) != "login.php"){
    header("Location: login.php");
    exit;
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark" style="background:#0D6EFD;">
  <div class="container">

    <a class="navbar-brand fw-bold text-white" href="Dashboard.php">SMS</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">

      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link text-white" href="Dashboard.php">Students</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="all_class.php">Classes</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="acadmic_year.php">Session</a></li>
      </ul>

      <a href="logout.php" class="btn btn-light btn-sm">Logout</a>

    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

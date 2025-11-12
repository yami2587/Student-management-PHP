<?php
require './db.php';
require './header.php';
require './functions.php';


$sessionYears = getsessions();
$getclasses = getclasses();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Academic Years</title>

</head>

<body>
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Academic Years</h3>
        <a href="add_acadmic.php" class="btn btn-primary btn-sm">➕ Add New</a>
    </div>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Start Year</th>
                <th>End Year</th>
                <th width="90">Edit</th>
                <th width="90">Delete</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach($sessionYears as $row): ?>
            <tr>
                <td><?= $row['session_id'] ?></td>
                <td><?= $row['start_year'] ?></td>
                <td><?= $row['end_year'] ?></td>
                <td><a href="edit_acadmic.php?id=<?= $row['session_id'] ?>" class="btn btn-warning btn-sm">Edit</a></td>
                <td><a href="del_acadmic.php?id=<?= $row['session_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this session?');">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
</body>
</html>

<?php
require './db.php';
require './header.php';
require './functions.php'; // if needed later
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Academic Year</title>



</head>
<body>

<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="m-0">Add Academic Year</h3>
        </div>
        <div class="card-body">

            <form action="insert_acadmic_year.php" method="POST">

                <div class="mb-3">
                    <label for="start_year" class="form-label">Starting Year</label>
                    <input type="number" class="form-control" name="start_year" id="start_year" required placeholder="e.g. 2024">
                </div>

                <div class="mb-3">
                    <label for="end_year" class="form-label">Ending Year</label>
                    <input type="number" class="form-control" name="end_year" id="end_year" required placeholder="e.g. 2025">
                </div>

                <button type="submit" name="submit" class="btn btn-success">Add Academic Year</button>

            </form>

        </div>
    </div>
</div>

</body>
</html>

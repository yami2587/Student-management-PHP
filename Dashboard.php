<?php 
require './db.php';
require './header.php';
require './functions.php';
$students = getStudents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Students Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Student List</h3>
        <a href="add_student.php" class="btn btn-primary btn-sm">➕ Add Student</a>
        
    </div>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Roll No</th>
                <th>Name</th>
                <th>Class</th>
                <th>Session</th>
                <th>Contact</th>
                <th>DOB</th>
                <th>Address</th> 
                <th>Details</th>
                <th>Guardian</th>
                <th>Guardian Number</th>
                <th width="90">Edit</th>
                <th width="90">Delete</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = $students->fetch_assoc()): ?>
        <tr>
            <td><?= $row['student_id'] ?></td>

            <td>
                <?php if(!empty($row['image'])): ?>
                    <img src="uploads/<?= $row['image'] ?>" width="55" height="55" class="rounded" style="object-fit:cover;">
                <?php else: ?>
                    <span class="text-muted">No Image</span>
                <?php endif; ?>
            </td>

            <td><?= $row['roll_no'] ?></td>
            <td><?= $row['student_name'] ?></td>
            <td><?= $row['class_name'] ?> - <?= $row['section'] ?></td>
            <td><?= $row['start_year'] ?> - <?= $row['end_year'] ?></td>
            <td><?= $row['contact_number'] ?></td>
            <td><?= $row['dob'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['details'] ?></td>
            <td><?= $row['guardian_name'] ?></td>
            <td><?= $row['guardian_number'] ?></td>

            <td><a href="edit_student.php?id=<?= $row['student_id'] ?>" class="btn btn-warning btn-sm">Edit</a></td>
            <td><a href="del_student.php?id=<?= $row['student_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this student?');">Delete</a></td>
        </tr>
        <?php endwhile; ?>
        </tbody>

    </table>

</div>

</body>
</html>


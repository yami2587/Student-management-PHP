<?php
require './db.php';
require './header.php';

// Fetch all deleted students
$trashed = $conn->query("
    SELECT s.*, c.class_name, c.section, ss.start_year, ss.end_year
    FROM students s
    JOIN class_master c ON s.class_id = c.class_id
    JOIN session_master ss ON s.session_id = ss.session_id
    WHERE s.is_deleted = 1
    ORDER BY s.student_id DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Trash - Deleted Students</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">🗑 Deleted Students</h3>
        <a href="Dashboard.php" class="btn btn-secondary btn-sm">← Back</a>
    </div>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Class</th>
                <th>Session</th>
                <th>Guardian</th>
                <th>Contact</th>
                <th>Restore</th>
                <th>Permanent Delete</th>
            </tr>
        </thead>

        <tbody>
        <?php while ($row = $trashed->fetch_assoc()): ?>
        <tr>
            <td><?= $row['student_id'] ?></td>
            <td>
                <?php if(!empty($row['image'])): ?>
                    <img src="uploads/<?= $row['image'] ?>" width="55" height="55" class="rounded" style="object-fit:cover;">
                <?php else: ?>
                    <span class="text-muted">No Image</span>
                <?php endif; ?>
            </td>
            <td><?= $row['student_name'] ?></td>
            <td><?= $row['class_name'] ?> - <?= $row['section'] ?></td>
            <td><?= $row['start_year'] ?> - <?= $row['end_year'] ?></td>
            <td><?= $row['guardian_name'] ?></td>
            <td><?= $row['contact_number'] ?></td>

            <td><a href="restore_student.php?id=<?= $row['student_id'] ?>" class="btn btn-success btn-sm">Restore</a></td>
            <td><a href="delete_permanent.php?id=<?= $row['student_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete permanently?')">Delete</a></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

</div>
</body>
</html>

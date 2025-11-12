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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class</title>
</head>

<body>
    <div class="contents">

        <h2>Class List</h2>
        <div>
            <a href="add_class.php"><span class="badge bg-primary">Add New Session</span></a>
        </div>
        <table class="table table-hover mb-3 pd-10 ">
            <thead>
                
            <tr>
                <th scope="col">Class ID</th>
                <th scope="col">Class Name</th>
                <th scope="col">Section</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

            </tr>
            </thead>
            <tbody> 
             
            <?php while ($row = $getclasses->fetch_assoc()): ?>
                <tr>
                    <td scope="row"><?php echo $row['class_id']; ?></td>
                    <td><?php echo $row['class_name']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td><a href="edit_class.php?id=<?php echo $row['class_id']; ?>"><span class="badge bg-primary">Edit</span></a></td>
                    <td><a href="del_class.php?id=<?php echo $row['class_id']; ?>"><span class="badge bg-danger">Delete</span></a></td>

                </tr>
            <?php endwhile; ?>    
            </tbody>
    </div>
</body>

</html>
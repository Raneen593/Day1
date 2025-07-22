<?php include '../db/dp.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3">Enrollments List</h3>
        <a href="add_enrollment.php" class="btn btn-success mb-3">Add New Enrollment</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Student Name</th>
                    <th>Course Title</th>
                    <th>Grade</th>
                    <th>Enrollment Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT e.id, s.name AS student_name, c.title AS course_title, 
                        e.grade, e.enrollment_date 
                        FROM enrollments e
                        JOIN students s ON e.student_id = s.id
                        JOIN courses c ON e.course_id = c.id";
                
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                        <td>{$row['student_name']}</td>
                        <td>{$row['course_title']}</td>
                        <td>{$row['grade']}</td>
                        <td>{$row['enrollment_date']}</td>
                        <td>
                            <a href='edit_enrollment.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_enrollment.php?id={$row['id']}' class='btn btn-danger btn-sm' 
                               onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php include './db/dp.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include './navbar.php';?>
    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-tittle">Students</h5>
                        <?php
                        $count=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM students"));
                        echo "<p class='card-text'> Total Student: <strong> {$count['total']}</strong></p>";
                        ?>
                        <a href="../Day8/students/students.php" class="btn btn-primary"> View Students</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-tittle">Courses</h5>
                        <?php
                        $count=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM courses"));
                        echo "<p class='card-text'> Total Courses: <strong> {$count['total']}</strong></p>";
                        ?>
                        <a href="../Day8/courses/courses.php" class="btn btn-success"> View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-tittle">Enrollments</h5>
                        <?php
                        $count=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM enrollments"));
                        echo "<p class='card-text'> Total Enrollments: <strong> {$count['total']}</strong></p>";
                        ?>
                        <a href="../Day8/enrollments/enrollments.php" class="btn btn-warning"> View Enrollments</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
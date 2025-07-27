<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-white">
    <?php include("navbar.php"); ?>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-4 d-flex align-items-center ">
                <h2 class="mb-0 ">Dashboard</h2>
            </div>
            <?php if ($Role == "admin") { ?>
            <div class="col-md-2 text-end  ">
                <a class="btn btn-outline-secondary text-secondary w-100" href="../Project/admin/dp.php">View Admin</a>
            </div>
            <div class="col-md-2 text-end">
                <a class="btn btn-outline-secondary text-secondary w-100" href="../Project/state/dp.php">View Login
                </a>
            </div>
            <?php } ?>
            <?php if ($Role == "user") { ?>
            <div class="col-md-2 text-end">
                <a class="btn btn-outline-secondary text-white w-100 bg-secondary" href="../Project/login.php">User
                    Dashboard</a>
            </div>
            <?php } ?>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-4 text-center">
                <div class="card shadow text-white">
                    <div class="card-body bg-dark">
                        <h5 class="card-title">Students</h5>
                        <?php
                    $student_Count = mysqli_query($connective, "SELECT COUNT(*) AS count FROM students");
                    $studentCount = mysqli_fetch_assoc($student_Count);
                    echo "<p class='card-text'>Total Students: " . $studentCount['count'] . "</p>";
                    ?>
                        <a href="../Project/student/student.php" class="btn btn-primary">View Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card shadow text-white">
                    <div class="card-body bg-dark">
                        <h5 class="card-title">Courses</h5>
                        <?php
                    $course_Count = mysqli_query($connective, "SELECT COUNT(*) AS count FROM courses");
                    $courseCount = mysqli_fetch_assoc($course_Count);
                    echo "<p class='card-text'>Total Courses: " . $courseCount['count'] . "</p>";
                    ?>
                        <a href="../Project/courses/course.php" class="btn btn-primary">View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card shadow text-white">
                    <div class="card-body bg-dark">
                        <h5 class="card-title">Enrollments</h5>
                        <?php
                    $enrollments_Count = mysqli_query($connective, "SELECT COUNT(*) AS count FROM enrollments");
                    $enrollmentsCounts = mysqli_fetch_assoc($enrollments_Count);
                    echo "<p class='card-text'>Total Enrollments: " . $enrollmentsCounts['count'] . "</p>";
                    ?>
                        <a href="../Project/enrollment/enrollment.php" class="btn btn-primary">View Enrollments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
$Const_URL = "/Day_10/Project";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = mysqli_connect("localhost:3310", "root", "test123root", "training_system");
$Role = $_SESSION["role"] ?? '';
$Name = $_SESSION["name"] ?? '';
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-white">
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <div class="d-flex">
                <?php if ($Role): ?>
                <a class="navbar-brand ms-auto" href="../Project/dashboard.php">Training_System <?= $Name ?>
                    (<?= $Role ?>)</a>

            </div>
            <div>
                <a class="btn btn-outline-light me-2" href="../Project/student/student.php">Students</a>
                <a class="btn btn-outline-light me-2" href="../Project/courses/course.php">Courses</a>
                <a class="btn btn-outline-light me-2" href="../Project/enrollment/enrollment.php">Enrollments</a>
                <?php endif; ?>
                <a class="btn btn-danger ms-2" href="../Project/logout.php">Logout</a>
            </div>
        </div>
    </nav>
</body>

</html>
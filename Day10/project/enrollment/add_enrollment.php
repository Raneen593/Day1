<?php
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"] ?? "";
    $course_id = $_POST["course_id"] ?? "";
    $grade = $_POST["grade"] ?? "";

    if ($student_id && $course_id && $grade) {
        $query = "INSERT INTO enrollments (student_id, course_id, grade, enrollment_date)
                    VALUES ('$student_id', '$course_id', '$grade', NOW())";
        mysqli_query($connective, $query);
        header("Location:enrollment.php?status=success");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-white">
    <?php include("../navbar.php"); ?>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 card shadow-sm p-4">
                <h2>Add Enrollment</h2>
                <form method="post">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Student</label>
                            <select class="form-select" name="student_id" required>
                                <option selected disabled>Choose Student</option>
                                <?php
                                $students = mysqli_query($connective, "SELECT id, name FROM students");
                                while ($row = mysqli_fetch_assoc($students)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Course</label>
                            <select class="form-select" name="course_id" required>
                                <option selected disabled>Choose Course</option>
                                <?php
                                $courses = mysqli_query($connective, "SELECT id, title FROM courses");
                                while ($row = mysqli_fetch_assoc($courses)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grade</label>
                        <input type="number" class="form-control" name="grade" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Enrollment</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
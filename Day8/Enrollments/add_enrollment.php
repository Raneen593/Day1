<?php include '../db/dp.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Enrollment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3">Add New Enrollment</h3>
        <form action="insert_enrollment.php" method="POST" class="card p-4">
            <div class="mb-3">
                <label class="form-label">Select Student</label>
                <select name="student_id" class="form-select" required>
                    <option value="">-- Select Student --</option>
                    <?php
                    $students = mysqli_query($conn, "SELECT id, name FROM students");
                    while ($student = mysqli_fetch_assoc($students)) {
                        echo "<option value='{$student['id']}'>{$student['name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Select Course</label>
                <select name="course_id" class="form-select" required>
                    <option value="">-- Select Course --</option>
                    <?php
                    $courses = mysqli_query($conn, "SELECT id, title FROM courses");
                    while ($course = mysqli_fetch_assoc($courses)) {
                        echo "<option value='{$course['id']}'>{$course['title']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Grade</label>
                <input type="text" name="grade" class="form-control" placeholder="A, B, C, etc.">
            </div>

            <div class="mb-3">
                <label class="form-label">Enrollment Date</label>
                <input type="date" name="enrollment_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Enroll Student</button>
        </form>
    </div>
</body>

</html>
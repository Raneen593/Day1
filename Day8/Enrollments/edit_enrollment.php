<?php 
include '../db/dp.php';
$id=$_GET['id'];
$sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM courses WHERE id=$id"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Courses</title>
</head>

<body>
    <?php include '../navbar.php';?>
    <div class="container mt-4">
        <h3 class="mb-3">Edit Student</h3>
        <form action="update_courses.php?id=<?=$id?>" class="card p-4" method="POST">
            <input name="title" value="<?=$sql['title'] ?>" class="form-control mb-2" required>
            <input name="description" value="<?=$sql['description'] ?>" class="form-control mb-2" required>
            <input name="hours" value="<?=$sql['hours'] ?>" class="form-control mb-2" required>
            <input name="price" value="<?=$sql['price'] ?>" class="form-control mb-2" required>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
<?php
include '../db/dp.php';

if(!isset($_GET['id'])) {
    header("Location: enrollments.php");
    exit();
}

$id = (int)$_GET['id'];
$enrollment = mysqli_fetch_assoc(mysqli_query($conn, 
    "SELECT * FROM enrollments WHERE id = $id"));

if(!$enrollment) {
    header("Location: enrollments.php?error=Enrollment not found");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Enrollment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include '../navbar.php'; ?>
    <div class="container mt-4">
        <h3 class="mb-3">Edit Enrollment</h3>
        <form action="update_enrollment.php" method="POST" class="card p-4">
            <input type="hidden" name="id" value="<?= $enrollment['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Student</label>
                <select name="student_id" class="form-select" required>
                    <?php
                    $students = mysqli_query($conn, "SELECT id, name FROM students");
                    while ($student = mysqli_fetch_assoc($students)) {
                        $selected = ($student['id'] == $enrollment['student_id']) ? 'selected' : '';
                        echo "<option value='{$student['id']}' $selected>{$student['name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Course</label>
                <select name="course_id" class="form-select" required>
                    <?php
                    $courses = mysqli_query($conn, "SELECT id, title FROM courses");
                    while ($course = mysqli_fetch_assoc($courses)) {
                        $selected = ($course['id'] == $enrollment['course_id']) ? 'selected' : '';
                        echo "<option value='{$course['id']}' $selected>{$course['title']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Grade</label>
                <input type="text" name="grade" value="<?= $enrollment['grade'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Enrollment Date</label>
                <input type="date" name="enrollment_date" value="<?= $enrollment['enrollment_date'] ?>"
                    class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Enrollment</button>
        </form>
    </div>
</body>

</html>
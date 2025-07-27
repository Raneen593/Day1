<?php
include("../db.php");

$id = $_GET['id'];
$student_id = $_POST["student_id"] ?? "";
$course_id = $_POST["course_id"] ?? "";
$grade = $_POST["grade"] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $sql = "UPDATE enrollments SET student_id='$student_id', course_id='$course_id', grade='$grade' WHERE id='$id'";
    mysqli_query($connective, $sql);
    header("Location: enrollment.php");
    exit;
}

$query = mysqli_query($connective, "SELECT * FROM enrollments WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
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
        <h2>Edit Enrollment</h2>
        <form action="edit_enrollment.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Student</label>
                <select class="form-select" name="student_id" required>
                    <?php
                    $students = mysqli_query($connective, "SELECT id, name FROM students");
                    while ($row = mysqli_fetch_assoc($students)) {
                        $selected = $row['id'] == $data['student_id'] ? "selected" : ""; 
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Course</label>
                <select class="form-select" name="course_id" required>
                    <?php
                    $courses = mysqli_query($connective, "SELECT id, title FROM courses");
                    while ($row = mysqli_fetch_assoc($courses)) {
                        $selected = $row['id'] == $data['course_id'] ? "selected" : ""; 
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['title'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Grade</label>
                <input type="text" class="form-control" name="grade" required>

            </div>
            <button type="submit" class="btn btn-primary">Update Enrollment</button>
        </form>
    </div>
</body>

</html>
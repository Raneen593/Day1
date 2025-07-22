<?php
include '../db/dp.php';

$student_id = $_POST['student_id'];
$course_id = $_POST['course_id'];
$grade = $_POST['grade'];
$enrollment_date = $_POST['enrollment_date'];

// التحقق من عدم تكرار التسجيل
$check = mysqli_query($conn, "SELECT id FROM enrollments 
                            WHERE student_id = $student_id AND course_id = $course_id");
if(mysqli_num_rows($check) > 0) {
    die("Error: Student is already enrolled in this course");
}

$sql = "INSERT INTO enrollments (student_id, course_id, grade, enrollment_date)
        VALUES ($student_id, $course_id, '$grade', '$enrollment_date')";

if(mysqli_query($conn, $sql)) {
    header("Location: enrollments.php?success=Enrollment added successfully");
} else {
    header("Location: enrollments.php?error=Error adding enrollment");
}
exit();
?>
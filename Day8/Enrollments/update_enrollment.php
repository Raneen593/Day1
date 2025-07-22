<?php
include '../db/dp.php';

if(!isset($_POST['id'])) {
    header("Location: enrollments.php");
    exit();
}

$id = (int)$_POST['id'];
$student_id = (int)$_POST['student_id'];
$course_id = (int)$_POST['course_id'];
$grade = $_POST['grade'];
$enrollment_date = $_POST['enrollment_date'];

$sql = "UPDATE enrollments SET
        student_id = $student_id,
        course_id = $course_id,
        grade = '$grade',
        enrollment_date = '$enrollment_date'
        WHERE id = $id";

if(mysqli_query($conn, $sql)) {
    header("Location: enrollments.php?success=Enrollment updated successfully");
} else {
    header("Location: enrollments.php?error=Error updating enrollment");
}
exit();
?>
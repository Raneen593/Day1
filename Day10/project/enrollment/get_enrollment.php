<?php
header("Content-Type: application/json");
include("../db.php");

$enrollments = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT enrollments.id, students.name AS student, courses.title AS course,
                   enrollments.grade, enrollments.enrollment_date AS enrollmentt
            FROM enrollments 
            JOIN students ON enrollments.student_id = students.id 
            JOIN courses ON enrollments.course_id = courses.id
            WHERE enrollments.id = ?";
    $stmt = mysqli_prepare($connective, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $sql = "SELECT enrollments.id, students.name AS student, courses.title AS course,
                   enrollments.grade, enrollments.enrollment_date AS enrollmentt
            FROM enrollments 
            JOIN students ON enrollments.student_id = students.id 
            JOIN courses ON enrollments.course_id = courses.id";
    $result = mysqli_query($connective, $sql);
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $enrollments[] = $row;
    }
} else {
    $enrollments = array("error" => "No enrollments found");
}

echo json_encode($enrollments);
?>
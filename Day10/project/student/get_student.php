<?php
header("Content-Type: application/json");
include("../db.php");

$students = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id=?";
    $stmt = mysqli_prepare($connective, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $sql = "SELECT * FROM students";
    $result = mysqli_query($connective, $sql);
}
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
} else {
    $students = array("error" => "NO Student Found");
}

echo json_encode($students);
?>
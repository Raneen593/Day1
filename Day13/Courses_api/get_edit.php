<?php
header("Content-Type: application/json");
include "db.php";

if (isset($_GET["id"]) && $_GET["id"] != null) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM courses where id = $id";
    $result = mysqli_query($conn, $sql);
    $courses = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
} else {
    $sql = "SELECT * FROM courses";
    $result = mysqli_query($conn, $sql);
    $courses = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
}

echo json_encode($courses);
?>
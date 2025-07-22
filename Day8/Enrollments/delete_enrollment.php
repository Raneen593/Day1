<?php
include '../db/dp.php';

if(!isset($_GET['id'])) {
    header("Location: enrollments.php");
    exit();
}

$id = (int)$_GET['id'];
mysqli_query($conn, "DELETE FROM enrollments WHERE id = $id");
header("Location: enrollments.php?success=Enrollment deleted successfully");
exit();
?>
<?php 
include '../db/dp.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM students WHERE id =$id");
header("Location: students.php");
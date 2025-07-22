<?php 
include '../db/dp.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM courses WHERE id =$id");
header("Location: courses.php");
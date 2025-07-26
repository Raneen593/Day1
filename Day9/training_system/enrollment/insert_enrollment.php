<?php
require("../index.php");
require("../navbar.php");
if($_SERVER["REQUEST_METHOD"]="POST"){
$name=$_POST["name"];
$title=$_POST["corse"];
$grade=$_POST["grade"];
$enrollment_date=$_POST["enrollment_date"];
$R=mysqli_query($con,"INSERT INTO `enrollments`( `student_id`, `course_id`, `grade`, `enrollment_date`) VALUES ('$name','$title','$grade','$enrollment_date')");
header("Location:dp.php");
exit();}
?>
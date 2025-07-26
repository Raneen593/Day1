<?php
require("../index.php");
require("../navbar.php");
if($_SERVER["REQUEST_METHOD"]=="POST" ){
$student=$_POST["name"];
$course=$_POST["course"];
$grade=$_POST["grade"];
$enrollment_date=$_POST["enrollment_date"];


$id=$_GET["id"];
$R=mysqli_query($con,"UPDATE `enrollments` SET `student_id`='$student',`course_id`='$course',`grade`='$grade',`enrollment_date`='$enrollment_date' WHERE id= '$id'");
header("Location:dp.php");
exit();
}
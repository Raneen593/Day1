<?php
require("../index.php");
require("../navbar.php");
if($_SERVER["REQUEST_METHOD"]="POST"){
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$date=$_POST["date"];
$R=mysqli_query($con,"INSERT INTO `students`(`NAME`, `email`, `phone`, `date_of_birth`) VALUES ('$name','$email','$phone','$date')");
header("Location:add_student.php");
exit();}
?>
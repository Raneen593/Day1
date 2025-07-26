<?php
require("../index.php");
require("../navbar.php");
if($_SERVER["REQUEST_METHOD"]="POST"){
$title=$_POST["title"];
$description=$_POST["description"];
$hours=$_POST["hours"];
$price=$_POST["price"];
$R=mysqli_query($con,"INSERT INTO `courses`( `title`, `description`, `hours`, `price`) VALUES ('$title','$description','$hours','$price')");
header("Location:add_course.php");
exit();}
?>
<?php
require("../index.php");
require("../navbar.php");
if($_SERVER["REQUEST_METHOD"]=="POST" ){
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$date=$_POST["date"];

$id=$_GET["id"];
$R=mysqli_query($con,"UPDATE `students` SET `NAME`='$name',`email`='$email',`phone`='$phone',`date_of_birth`='$date' WHERE id= '$id'");
header("Location:dp.php");
exit();}
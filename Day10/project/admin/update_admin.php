<?php
require("../index.php");
require("../navbar.php");
if($_SERVER["REQUEST_METHOD"]=="POST" ){
$name=$_POST["name"];
$email=$_POST["email"];
$role=$_POST["role"];

$email1=$_GET["email"];
$R=mysqli_query($con,"UPDATE `admin` SET `username`='$name',`email`='$email',`role`='$role' WHERE email= '$email1'");
header("Location:dp.php");
exit();}
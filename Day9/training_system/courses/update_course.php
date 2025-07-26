<?php
require("../index.php");
require("../navbar.php");
if($_SERVER["REQUEST_METHOD"]=="POST" ){
$title=$_POST["title"];
$description=$_POST["description"];
$hours=$_POST["hours"];
$price=$_POST["price"];


$id=$_GET["id"];
$R=mysqli_query($con,"UPDATE `courses` SET `title`='$title',`description`='$description',`hours`='$hours',`price`='$price' WHERE id= '$id'");
header("Location:dp.php");
exit();
}
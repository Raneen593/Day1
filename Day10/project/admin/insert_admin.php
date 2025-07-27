<?php
require("../index.php");
require("../navbar.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
$name=$_POST["name"];
$email=$_POST["email"];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
$role=$_POST["role"];
if(mysqli_num_rows(mysqli_query($con,"SELECT `role`, `username`, `email`, `password` FROM `admin` WHERE email='$email'"))==0){
$R=mysqli_query($con,"INSERT INTO `admin`(`username`, `email`, `password`, `role`) VALUES ('$name','$email','$password','$role')");
header("Location:add_admin.php");
exit();}else{
    header("Location:add_admin.php");
exit();   
}}
?>
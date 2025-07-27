<?php
require("../index.php");
require("../navbar.php");
$email=$_GET["email"];
$R=mysqli_query($con,"DELETE FROM `admin` WHERE email ='$email'");
header("Location:dp.php");
exit();?>
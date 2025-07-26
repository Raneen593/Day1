<?php
require("../index.php");
require("../navbar.php");
$id=$_GET["id"];
$R=mysqli_query($con,"DELETE FROM `courses` WHERE id=$id");
header("Location:dp.php");
exit();?>
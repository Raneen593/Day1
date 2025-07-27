<?php
include("../db.php");
$id=$_GET['id'];
$query = "DELETE FROM courses WHERE id='$id'";
$result = mysqli_query($connective,$query);
header("Location: course.php");
?>
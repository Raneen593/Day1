<?php
include("../db.php");
$id=$_GET['id'];
$query = "DELETE FROM enrollments WHERE id='$id'";
$result = mysqli_query($connective,$query);
header("Location: enrollment.php");
?>
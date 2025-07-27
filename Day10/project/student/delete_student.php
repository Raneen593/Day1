<?php
include("../db.php");
$id=$_GET['id'];
$query = "DELETE FROM students WHERE id='$id'";
$result = mysqli_query($connective,$query);
header("Location: student.php");
?>
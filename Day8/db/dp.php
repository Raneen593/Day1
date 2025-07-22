<?php
$conn = mysqli_connect("localhost:3310", "root", "test123root", "training_system");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>